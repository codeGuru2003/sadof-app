<?php

namespace App\Http\Controllers;

use App\Models\BirthMonth;
use App\Models\Gender;
use Illuminate\Support\Facades\DB;
use App\Models\Member;
use App\Models\Position;
use Illuminate\Http\Request;
use Faker\Provider\Image;
use Illuminate\Support\Facades\Response;
use League\Csv\Reader;
use League\Csv\Writer;
use Illuminate\Support\Str;

class MemberController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $members = DB::table('members')
                    ->join('genders', 'members.gender_id','=','genders.id')
                    ->join('positions','members.position_id','=','positions.id')
                    ->select('members.*','genders.name as gname','positions.name as pname')
                    ->get();
        return view('members.index', [
            'title' => 'Index',
            'members' => $members,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $genders = Gender::pluck('name', 'id');
        $positions = Position::pluck('name','id');
        $birthmonths = BirthMonth::pluck('name','id');
        return view('members.create',compact('genders','positions','birthmonths'),[
            'title' => 'Create',
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */

    public function store(Request $request)
    {
        $path = $request->file('image')->store('images','public');

        $member = new Member();
        $member->firstname = $request->input('firstname');
        $member->middlename = $request->input('middlename');
        $member->lastname = $request->input('lastname');
        $member->dateofbirth = $request->input('dateofbirth');
        $member->gender_id = $request->input('gender_id');
        $member->address = $request->input('address');
        $member->contact_1 = $request->input('contact_1');
        $member->contact_2 = $request->input('contact_2');
        $member->email = $request->input('email');
        $member->is_leader = $request->has('is_leader');
        $member->position_id = $request->input('position_id');
        $member->birth_month_id = $request->input('birth_month_id');
        $member->image = $path;

        $member->save();
        return redirect('/members')->with('msg', 'Record created successfully.');
    }
    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Member  $member
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $member = DB::table('members')
                    ->join('genders', 'members.gender_id', '=', 'genders.id')
                    ->join('positions', 'members.position_id', '=', 'positions.id')
                    ->join('birth_months', 'members.birth_month_id','=','birth_months.id')
                    ->select('members.*', 'genders.name as gname', 'positions.name as pname', 'birth_months.name as bname')
                    ->where('members.id', '=', $id)
                    ->first();
        $imageUrl = asset($member->image);
        return view('members.details',[
            'title' => 'Details',
            'member' => $member,
            'imageUrl' => $imageUrl
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Member  $member
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $member = DB::table('members')
                    ->join('genders', 'members.gender_id', '=', 'genders.id')
                    ->join('positions', 'members.position_id', '=', 'positions.id')
                    ->join('birth_months','members.birth_month_id','=','birth_months.id')
                    ->select('members.*', 'genders.name as gname', 'positions.name as pname','birth_months.name as bname')
                    ->where('members.id', '=', $id)
                    ->first();
        return view('members.edit',[
            'member' => $member,
            'title' => 'Edit',
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Member  $member
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Member $member)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Member  $member
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $member = Member::find($id);
        $member->delete();
        return redirect('/members')->with('msg','Record deleted successfully');
    }

    public function upload(Request $request){
        $request->validate([
            'csv_file' => 'required|mimes:csv,txt',
        ]);
        $uploadedFile = $request->file('csv_file');
        $filename = 'uploaded_csv_' . time() . '.' . $uploadedFile->getClientOriginalExtension();
        $path = $uploadedFile->storeAs('csv', $filename, 'public');
        $path = $uploadedFile->storeAs('csv', $filename, 'public');
        $csvFilePath = storage_path('app/public/' . $path);
        // Initialize a CSV reader
        $csv = Reader::createFromPath($csvFilePath, 'r');
        $csv->setHeaderOffset(0); // Skip the header row if it exists
        $monthMap = [
            'Jan' => '01',
            'Feb' => '02',
            'Mar' => '03',
            'Apr' => '04',
            'May' => '05',
            'Jun' => '06',
            'Jul' => '07',
            'Aug' => '08',
            'Sep' => '09',
            'Oct' => '10',
            'Nov' => '11',
            'Dec' => '12',
        ];
        foreach ($csv as $row) {
            $dateOfBirth = $row['Date of Birth'];

            $dateParts = explode('-', $dateOfBirth);
            if (count($dateParts) === 3) {
                $day = $dateParts[0];
                $month = $dateParts[1];
                $year = $dateParts[2];

                // Convert the month name to its numeric equivalent
                if (isset($monthMap[$month])) {
                    $numericMonth = $monthMap[$month];
                } else {
                    // Handle invalid month names here, if needed
                    $numericMonth = '00';
                }

                // Create the new date of birth format (yyyy-mm-dd)
                $newDateOfBirth = "20{$year}-{$numericMonth}-{$day}";

                $firstName = $row['First Name'];
                $middleName = $row['Middle Name'];
                $lastName = $row['Last Name'];
                $gender = $row['Gender'];
                $address = $row['Address'];
                $contact_1 = $row['Contact 1'];
                $contact_2 = $row['Contact 2'];
                $email = $row['Email Address'];
                $image = $row['Member Image'];
                $isLeader = $row['Leadership'];
                $position = $row['Position'];
                $birthMonth = $row['Month of Birth'];

                // Perform your processing logic here, e.g., save to the database
                // You can also add data validation and other processing as needed

                // Example: Save data to a database
                Member::create([
                    'firstname' => $firstName,
                    'middlename' => $middleName,
                    'lastname' => $lastName,
                    'dateofbirth' => $newDateOfBirth,
                    'gender_id' => $gender,
                    'address' => $address,
                    'contact_1' => $contact_1,
                    'contact_2' => $contact_2,
                    'email' => $email,
                    'image' => $image,
                    'is_leader' => $isLeader,
                    'position_id' => $position,
                    'birth_month_id' => $birthMonth,
                ]);
            }
        }
        // Optionally, you can provide feedback to the user
        return redirect('/members')->with('msg', 'CSV file processed successfully.');
    }

    public function exportToCsv()
    {
        // Query the data using Eloquent (adjust the query as needed)
        $members = Member::all();

        // Create a new CSV instance
        $csv = Writer::createFromFileObject(new \SplTempFileObject());

        // Add a header row to the CSV
        $csv->insertOne([
            'First Name',
            'Middle Name',
            'Last Name',
            'Date of Birth',
            'Gender',
            'Address',
            'Contact 1',
            'Contact 2',
            'Email Address',
            'Contact',
            'Member Image',
            'Leadership',
            'Position',
            'Month of Birth',
        ]);

        // Add data rows to the CSV
        foreach ($members as $member) {
            $csv->insertOne([
                $member->first_name,
                $member->middle_name,
                $member->last_name,
                $member->date_of_birth,
                $member->gender,
                $member->address,
                $member->contact_1,
                $member->contact_2,
                $member->email,
                $member->contact,
                $member->member_image,
                $member->leadership,
                $member->position,
                $member->month_of_birth,
            ]);
        }

            // Generate a unique temporary file name
        $tempFilename = Str::random(16) . '.csv';

        // Save the CSV data to a temporary file
        $csv->output($tempFilename);

        // Set the response headers
        $headers = [
            'Content-Type' => 'text/csv',
            'Content-Disposition' => 'attachment; filename="members.csv"',
        ];

        // Read the temporary file contents
        $fileContents = file_get_contents($tempFilename);

        // Delete the temporary file
        unlink($tempFilename);

        // Create an HTTP response with the CSV content
        $response = new Response($fileContents, 200, $headers);

        return $response;
    }
}
