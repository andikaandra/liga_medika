<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Payment;
use App\IMARC;
use App\IMARCParticipant;
use Auth;
use App\Lomba;
use Validator;
use Log;
use App\Submission;

class ImarcController extends Controller
{

    public function registerImarcPhotographyPage(){
        $lomba = Lomba::find(9);
        if ($lomba->status_pendaftaran) {
          return view('registration-forms.photography', compact('lomba'));
        }
        else{
          return redirect()->action('PagesController@index');
        }
    }

    public function registerImarcDancePage(){
        $lomba = Lomba::find(10);
        if ($lomba->status_pendaftaran) {
          return view('registration-forms.traditional-dance', compact('lomba'));
        }
        else{
          return redirect()->action('PagesController@index');
        }
    }

    public function registerImarcVocalPage(){
        $lomba = Lomba::find(11);
        if ($lomba->status_pendaftaran) {
          return view('registration-forms.vocal-group', compact('lomba'));
        }
        else{
          return redirect()->action('PagesController@index');
        }
    }

    public function registerImarcBandPage(){
        $lomba = Lomba::find(12);
        if ($lomba->status_pendaftaran) {
          return view('registration-forms.band', compact('lomba'));
        }
        else{
          return redirect()->action('PagesController@index');
        }
    }

    public function downloadTemplatesBand() {
      return response()->download(storage_path("app/public/committee-files/imarc-template-band.zip"));
    }

    public function downloadTemplatesDance() {
      return response()->download(storage_path("app/public/committee-files/imarc-template-dance.zip"));
    }

    public function downloadTemplatesFoto() {
      return response()->download(storage_path("app/public/committee-files/imarc-template-foto.zip"));
    }
    public function downloadTemplatesVg() {
      return response()->download(storage_path("app/public/committee-files/imarc-template-vg.zip"));
    }

    public function registerImarcPhotography(Request $request) {
      $tipe_lomba = 9;
      $user_id = Auth::user()->id;

      try {
        // make sure file uploaded are within size limit and file type
        $validator = Validator::make($request->all(), [
            'bukti_pembayaran' => 'bail|required|max:1100|mimes:jpeg,jpg,png',
            'nama_rekening' => 'bail|required',
            'jumlah_transfer' => 'bail|required'
        ]);

        if (strlen(str_replace('.','',$request->jumlah_transfer))>=10) {
          return redirect()->back();
        }

        // test the validator out
        if ($validator->fails()) {
          return redirect()
                      ->back()
                      ->withErrors($validator)
                      ->withInput();
        }

        $rules = [];

        for ($i=1; $i <=$request->daftarPeserta ; $i++) {
            $rules['data_peserta'.$i] = 'bail|required|max:3100|mimes:zip';
            $rules['nama'.$i] = 'bail|required';
            $rules['univ'.$i] = 'bail|required';
            $rules['jurusan'.$i] = 'bail|required';
        }

        $validator = Validator::make($request->all(), $rules);

        if ($validator->fails()) {
          return redirect()
                      ->back()
                      ->withErrors($validator)
                      ->withInput();
        }

        $user = User::find($user_id)->update([
          'cabang_spesifik' => 9,
        ]);



        $imarc = IMARC::create([
          'user_id' => $user_id,
          'event_type' => 1,
          'gelombang' => $request->gelombang,
          'status_pembayaran' => 1 //1 dp, 2 lunas
        ]);

        for ($i=1; $i <=$request->daftarPeserta ; $i++) {
          // store the participant files
          $path = $request->file('data_peserta' . $i)->store('public/imarc/photography-participants');

          $deskripsi_berkas = $request->{'files_description_'.$i};
          $files_complete = $request->{'files_complete_'.$i};


          IMARCParticipant::create([
            'imarc_id' => $imarc->id,
            'nama' => $request->{'nama'.$i},
            'universitas' => $request->{'univ'.$i},
            'jurusan' => $request->{'jurusan'.$i},
            'file_path' => str_replace("public","", $path),
            'deskripsi_berkas' => $deskripsi_berkas,
            'berkas_lengkap' => $files_complete
          ]);
        }

        $path = $request->file('bukti_pembayaran')->store('public/photography-payments');
        // upload payment details
        Payment::create([
          'user_id' => $user_id,
          'tipe_lomba' => $tipe_lomba,
          'location' => str_replace("public","", $path),
          'tipe_pembayaran' => 1, //// TODO: change tipe to DP or Lunas
          'nama_rekening' => $request->nama_rekening,
          'jumlah' => str_replace('.','',$request->jumlah_transfer)
        ]);

      } catch (\Exception $e) {
        $message = 'Photography - User: ' . Auth::user()->email . ', error: ' . $e->getMessage();
        Log::emergency($message);
        return redirect()->route('regis.error');
      }
      return redirect('users');
    }

    public function registerImarcDance(Request $request) {
      $tipe_lomba = 10;
      $user_id = Auth::user()->id;

      try {
        // make sure file uploaded are within size limit and file type
        $validator = Validator::make($request->all(), [
            'bukti_pembayaran' => 'bail|required|max:1100|mimes:jpeg,jpg,png',
            'nama_rekening' => 'bail|required',
            'jumlah_transfer' => 'bail|required'
        ]);

        if (strlen(str_replace('.','',$request->jumlah_transfer))>=10) {
          return redirect()->back();
        }

        // test the validator out
        if ($validator->fails()) {
          return redirect()
                      ->back()
                      ->withErrors($validator)
                      ->withInput();
        }

        $rules = [];
        
        for ($i=1; $i <=$request->daftarPeserta ; $i++) {
            $rules['data_peserta'.$i] = 'bail|required|max:3100|mimes:zip';
            $rules['nama'.$i] = 'bail|required';
            $rules['univ'.$i] = 'bail|required';
            $rules['jurusan'.$i] = 'bail|required';
        }

        $validator = Validator::make($request->all(), $rules);

        if ($validator->fails()) {
          return redirect()
                      ->back()
                      ->withErrors($validator)
                      ->withInput();
        }

        $user = User::find($user_id)->update([
          'cabang_spesifik' => 10,
        ]);
      
        $imarc = IMARC::create([
          'user_id' => $user_id,
          'event_type' => 2,          
          'gelombang' => $request->gelombang,
          'status_pembayaran' => 1 //1 dp, 2 lunas
        ]);

        for ($i=1; $i <=$request->daftarPeserta ; $i++) {
          // store the participant files
        $path = $request->file('data_peserta' . $i)->store('public/imarc/dance-participants');
        
        $deskripsi_berkas = $request->{'files_description_'.$i};
        $files_complete = $request->{'files_complete_'.$i};


          IMARCParticipant::create([
            'imarc_id' => $imarc->id,
            'nama' => $request->{'nama'.$i},
            'universitas' => $request->{'univ'.$i},
            'jurusan' => $request->{'jurusan'.$i},
            'file_path' => str_replace("public","", $path),
            'deskripsi_berkas' => $deskripsi_berkas,
            'berkas_lengkap' => $files_complete
          ]);
        }

        $path = $request->file('bukti_pembayaran')->store('public/dance-payments');
        // upload payment details
        Payment::create([
          'user_id' => $user_id,
          'tipe_lomba' => $tipe_lomba,
          'location' => str_replace("public","", $path),
          'tipe_pembayaran' => 1, //// TODO: change tipe to DP or Lunas
          'nama_rekening' => $request->nama_rekening,
          'jumlah' => str_replace('.','',$request->jumlah_transfer)
        ]);

      } catch (\Exception $e) {
        $message = 'Traditional Dance - User: ' . Auth::user()->email . ', error: ' . $e->getMessage();
        Log::emergency($message);
        return redirect()->route('regis.error');
      }
      return redirect('users');
    }

    public function registerImarcVocal(Request $request) {
      $tipe_lomba = 11;
      $user_id = Auth::user()->id;

      try {
        // make sure file uploaded are within size limit and file type
        $validator = Validator::make($request->all(), [
            'bukti_pembayaran' => 'bail|required|max:1100|mimes:jpeg,jpg,png',
            'nama_rekening' => 'bail|required',
            'jumlah_transfer' => 'bail|required'
        ]);

        if (strlen(str_replace('.','',$request->jumlah_transfer))>=10) {
          return redirect()->back();
        }

        // test the validator out
        if ($validator->fails()) {
          return redirect()
                      ->back()
                      ->withErrors($validator)
                      ->withInput();
        }

        $rules = [];
        
        for ($i=1; $i <=$request->daftarPeserta ; $i++) {
            $rules['data_peserta'.$i] = 'bail|required|max:3100|mimes:zip';
            $rules['nama'.$i] = 'bail|required';
            $rules['univ'.$i] = 'bail|required';
            $rules['jurusan'.$i] = 'bail|required';
        }

        $validator = Validator::make($request->all(), $rules);

        if ($validator->fails()) {
          return redirect()
                      ->back()
                      ->withErrors($validator)
                      ->withInput();
        }

        $user = User::find($user_id)->update([
          'cabang_spesifik' => 11,
        ]);

  
        $imarc = IMARC::create([
          'user_id' => $user_id,
          'event_type' => 3,
          'gelombang' => $request->gelombang,
          'status_pembayaran' => 1 //1 dp, 2 lunas
        ]);

        for ($i=1; $i <=$request->daftarPeserta ; $i++) {
          // store the participant files
          $path = $request->file('data_peserta' . $i)->store('public/imarc/vocal-participants');


          $deskripsi_berkas = $request->{'files_description_'.$i};
          $files_complete = $request->{'files_complete_'.$i};
          
          IMARCParticipant::create([
            'imarc_id' => $imarc->id,
            'nama' => $request->{'nama'.$i},
            'universitas' => $request->{'univ'.$i},
            'jurusan' => $request->{'jurusan'.$i},
            'file_path' => str_replace("public","", $path),
            'deskripsi_berkas' => $deskripsi_berkas,
            'berkas_lengkap' => $files_complete

          ]);
        }

        $path = $request->file('bukti_pembayaran')->store('public/vocal-payments');
        // upload payment details
        Payment::create([
          'user_id' => $user_id,
          'tipe_lomba' => $tipe_lomba,
          'location' => str_replace("public","", $path),
          'tipe_pembayaran' => 1, //// TODO: change tipe to DP or Lunas
          'nama_rekening' => $request->nama_rekening,
          'jumlah' => str_replace('.','',$request->jumlah_transfer)
        ]);

      } catch (\Exception $e) {
        $message = 'Vocal group - User: ' . Auth::user()->email . ', error: ' . $e->getMessage();
        Log::emergency($message);
        return redirect()->route('regis.error');
      }
      return redirect('users');
    }

    public function registerImarcBand(Request $request) {
      $tipe_lomba = 12;
      $user_id = Auth::user()->id;

      try {
        // make sure file uploaded are within size limit and file type
        $validator = Validator::make($request->all(), [
            'bukti_pembayaran' => 'max:1100|mimes:jpeg,jpg,png',
            'nama_rekening' => 'bail|required',
            'jumlah_transfer' => 'bail|required'
        ]);

        if (strlen(str_replace('.','',$request->jumlah_transfer))>=10) {
          return redirect()->back();
        }

        // test the validator out
        if ($validator->fails()) {
          return redirect()
                      ->back()
                      ->withErrors($validator)
                      ->withInput();
        }

        $rules = [];
        
        for ($i=1; $i <=$request->daftarPeserta ; $i++) {
            $rules['data_peserta'.$i] = 'bail|required|max:3100|mimes:zip';
            $rules['nama'.$i] = 'bail|required';
            $rules['univ'.$i] = 'bail|required';
            $rules['jurusan'.$i] = 'bail|required';
        }

        $validator = Validator::make($request->all(), $rules);

        if ($validator->fails()) {
          return redirect()
                      ->back()
                      ->withErrors($validator)
                      ->withInput();
        }


        $user = User::find($user_id)->update([
          'cabang_spesifik' => 12,
        ]);


        $imarc = IMARC::create([
          'user_id' => $user_id,
          'event_type' => 4,
          'gelombang' => $request->gelombang,
          'status_pembayaran' => 1 //1 dp, 2 lunas
        ]);

        for ($i=1; $i <=$request->daftarPeserta ; $i++) {
          // store the participant files
          $path = $request->file('data_peserta' . $i)->store('public/imarc/band-participants');

          
          $deskripsi_berkas = $request->{'files_description_'.$i};
          $files_complete = $request->{'files_complete_'.$i};

          IMARCParticipant::create([
            'imarc_id' => $imarc->id,
            'nama' => $request->{'nama'.$i},
            'universitas' => $request->{'univ'.$i},
            'jurusan' => $request->{'jurusan'.$i},
            'file_path' => str_replace("public","", $path),
            'deskripsi_berkas' => $deskripsi_berkas,
            'berkas_lengkap' => $files_complete
          ]);
        }

        $path = $request->file('bukti_pembayaran')->store('public/band-payments');
        // upload payment details
        Payment::create([
          'user_id' => $user_id,
          'tipe_lomba' => $tipe_lomba,
          'location' => str_replace("public","", $path),
          'tipe_pembayaran' => 1, //// TODO: change tipe to DP or Lunas
          'nama_rekening' => $request->nama_rekening,
          'jumlah' => str_replace('.','',$request->jumlah_transfer)
        ]);

      } catch (\Exception $e) {
        $message = 'Band - User: ' . Auth::user()->email . ', error: ' . $e->getMessage();
        Log::emergency($message);
        return redirect()->route('regis.error');
      }
      return redirect('users');
    }

    public function getPhotography() {
      return response()->json(['data' => IMARC::where('event_type', 1)->with('user:id,email,name')->get()]);
    }

    public function getDance() {
      return response()->json(['data' => IMARC::where('event_type', 2)->with('user:id,email,name')->get()]);
    }

    public function getVocal() {
      return response()->json(['data' => IMARC::where('event_type', 3)->with('user:id,email,name')->get()]);
    }

    public function getBand() {
      return response()->json(['data' => IMARC::where('event_type', 4)->with('user:id,email,name')->get()]);
    }

    public function findImarcDetails($id) {
      $imarc = IMARC::find($id);
      $payment = Payment::where('user_id', $imarc->user_id)->where('tipe_pembayaran', 1)->first();
      return response()->json(['payment' => $payment, 'user_id' => $imarc->user_id,
      'participants' => $imarc->participants]);
    }

    public function acceptImarc($id) {
      $imarc = IMARC::find($id);
      $userUpdate =   $imarc->user->update([
          'lomba_verified' => 1
        ]);
      $inamscUpdate = $imarc->update([
        'status_pembayaran' => 1,
        'status_verif' => 1
      ]);
      return response()->json(['message' => 'ok']);
    }

    public function declineImarc($id) {
      $imarc = IMARC::find($id);
      $userUpdate =   $imarc->user->update([
          'lomba_verified' => -1
        ]);
      $inamscUpdate = $imarc->update([
        'status_pembayaran' => -1,
        'status_verif' => -1
      ]);
      return response()->json(['message' => 'ok']);
    }

    public function uploadSubmission(Request $request) {

      // return Auth::user()->imarcs[0]->id;

      // make sure file uploaded are within size limit and file type
      $validator = Validator::make($request->all(), [
          'file_path' => 'required|max:6100|mimes:zip',
          'quill_contents' => 'required'
      ]);

      // test the validator out
      if ($validator->fails()) {
        return redirect()
                    ->back()
                    ->withErrors($validator)
                    ->withInput();
      }

      try {
        $path = $request->file('file_path')->store('public/imarc/karya-submissions');
        $path = str_replace("public","", $path);
      
  
        Submission::create([
          'imarc_id' => Auth::user()->imarcs[0]->id,
          'title' => $request->quill_contents,
          'file_path' => $path
        ]);        
      } catch (Exception $e) {
        $message = 'Uploaded photography IMARC - User: ' . Auth::user()->email . ', error: ' . $e->getMessage();
        Log::emergency($message);
        return "Upload error. Please contact commitee";
      }

      return redirect('users/uploads')->with('message', 'Successfully uploaded!');

    }

    public function getImarcSubmissions($type) {
      // get educational videos data that has submission
      $photos = User::where('cabang_spesifik', $type)
                ->whereHas('imarcs.submissions')->with('imarcs.submissions')->get();

      return response()->json(['data' => $photos]);
    }

    public function findImarcSubmissions($id) {
      return response()->json(Submission::find($id));
    }

    public function downloadSubmissions($id) {
      $path = Submission::find($id);
      $myFile = public_path().'/storage'.$path->file_path;
      $headers = array('Content-Type: application/octet-stream','Content-Length: '. filesize($myFile));
      $newName = str_slug($path->imarc->user->name).'.zip';   
      return response()->download(storage_path("app/public". $path->file_path, $newName, $headers));
    }

    public function downloadGuidelines() {
      $myFile = storage_path("app/public/committee-files/Peraturan Umum IMARC 2019.pdf");
      $headers = array('Content-Type: application/octet-stream','Content-Length: '. filesize($myFile));
      return response()->download(storage_path("app/public/committee-files/Peraturan Umum IMARC 2019.pdf", 'Peraturan Umum IMARC 2019.pdf', $headers));      
    }

    public function downloadImarcFiles() {
      return response()->download(storage_path("app/public/committee-files/IMARC.zip"));
    }

}
