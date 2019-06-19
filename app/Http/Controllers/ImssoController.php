<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Symposium;
use App\Payment;
use App\IMSSO;
use App\IMSSOParticipant;
use Auth;
use App\Lomba;
use Validator;
use Log;

class ImssoController extends Controller
{
    public function registerImssoMenBasketballPage(){
        $lomba = Lomba::find(6);
        if ($lomba->status_pendaftaran) {
          return view('registration-forms.men-basketball', compact('lomba'));
        }
        else{
          return redirect()->action('PagesController@index');
        }
    }

    public function registerImssoWomenBasketballPage(){
        $lomba = Lomba::find(7);
        if ($lomba->status_pendaftaran) {
          return view('registration-forms.women-basketball', compact('lomba'));
        }
        else{
          return redirect()->action('PagesController@index');
        }
    }

    public function registerImssoMenFutsalPage(){
        $lomba = Lomba::find(8);
        if ($lomba->status_pendaftaran) {
          return view('registration-forms.men-futsal', compact('lomba'));
        }
        else{
          return redirect()->action('PagesController@index');
        }
    }

    public function registerImssoMenBasketball(Request $request) {
      $tipe_lomba = 6;
      $user_id = Auth::user()->id;
      
      try {
        // make sure file uploaded are within size limit and file type
        $validator = Validator::make($request->all(), [
            'bukti_pembayaran' => 'bail|required|max:1100|mimes:jpeg,jpg,png',
            'nama_rekening' => 'bail|required',
            'jumlah_transfer' => 'bail|required'
        ]);

        // make sure jumlah_transfer doesnt exceced max decimal capacity
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
        
        // rules for each peserta
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
          'cabang_spesifik' => $tipe_lomba,
        ]);

        $imsso = IMSSO::create([
          'user_id' => $user_id,
          'sport_type' => 1,
          'gelombang' => $request->gelombang,
          'status_pembayaran' => 1 //1 dp, 2 lunas
        ]);

        // create instance of participants
        for ($i=1; $i <=$request->daftarPeserta ; $i++) {

          $path = $request->file('data_peserta' . $i)->store('public/imsso/men-basketball-participants');

          $deskripsi_berkas = $request->{'files_description_'.$i};
          $files_complete = $request->{'files_complete_'.$i};

          IMSSOParticipant::create([
            'imsso_id' => $imsso->id,
            'nama' => $request->{'nama'.$i},
            'universitas' => $request->{'univ'.$i},
            'jurusan' => $request->{'jurusan'.$i},
            'file_path' => str_replace("public","", $path),
            'deskripsi_berkas' => $deskripsi_berkas,
            'berkas_lengkap' => $files_complete
          ]);
        }

        $path = $request->file('bukti_pembayaran')->store('public/men-basketball-payments');
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
        $message = 'Men basketball - User: ' . Auth::user()->email . ', error: ' . $e->getMessage();
        Log::emergency($message);
        return redirect()->route('regis.error');
      }
      return redirect('users');
    }

    public function registerImssoWomenBasketball(Request $request) {
      $tipe_lomba = 7;
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
          'cabang_spesifik' => 7,
        ]);

        
        $imsso = IMSSO::create([
          'user_id' => $user_id,
          'sport_type' => 2,
          'gelombang' => $request->gelombang,
          'status_pembayaran' => 1 //1 dp, 2 lunas
        ]);

        for ($i=1; $i <=$request->daftarPeserta ; $i++) {
          $deskripsi_berkas = $request->{'files_description_'.$i};
          $files_complete = $request->{'files_complete_'.$i};

          // store the participant files
          $path = $request->file('data_peserta' . $i)->store('public/imsso/women-basketball-participants');
          IMSSOParticipant::create([
            'imsso_id' => $imsso->id,
            'nama' => $request->{'nama'.$i},
            'universitas' => $request->{'univ'.$i},
            'jurusan' => $request->{'jurusan'.$i},
            'file_path' => str_replace("public","", $path),
            'deskripsi_berkas' => $deskripsi_berkas,
            'berkas_lengkap' => $files_complete
          ]);
        }

        $path = $request->file('bukti_pembayaran')->store('public/women-basketball-payments');
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
        $message = 'Women basketball - User: ' . Auth::user()->email . ', error: ' . $e->getMessage();
        Log::emergency($message);
        return redirect()->route('regis.error');
      }
      return redirect('users');
    }

    public function registerImssoMenFutsal(Request $request) {
      $tipe_lomba = 8;
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
          'cabang_spesifik' => 8,
        ]);

      
        $imsso = IMSSO::create([
          'user_id' => $user_id,
          'sport_type' => 3,
          'gelombang' => $request->gelombang,
          'status_pembayaran' => 1 //1 dp, 2 lunas
        ]);

        for ($i=1; $i <=$request->daftarPeserta ; $i++) {
          $deskripsi_berkas = $request->{'files_description_'.$i};
          $files_complete = $request->{'files_complete_'.$i};
          
          // store the participant files
          $path = $request->file('data_peserta' . $i)->store('public/imsso/men-futsal-participants');
          
          IMSSOParticipant::create([
            'imsso_id' => $imsso->id,
            'nama' => $request->{'nama'.$i},
            'universitas' => $request->{'univ'.$i},
            'jurusan' => $request->{'jurusan'.$i},
            'file_path' => str_replace("public","", $path),
            'deskripsi_berkas' => $deskripsi_berkas,
            'berkas_lengkap' => $files_complete
          ]);
        }

        $path = $request->file('bukti_pembayaran')->store('public/men-futsal-payments');
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
        $message = 'Men futsal - User: ' . Auth::user()->email . ', error: ' . $e->getMessage();
        Log::emergency($message);
        return redirect()->route('regis.error');
      }
      return redirect('users');
    }


    public function getMenBasketball() {
      return response()->json(['data' => IMSSO::where('sport_type', 1)->with('user:id,email,name')->get()]);
    }

    public function getWomenBasketball() {
      return response()->json(['data' => IMSSO::where('sport_type', 2)->with('user:id,email,name')->get()]);
    }

    public function getMenFutsal() {
      return response()->json(['data' => IMSSO::where('sport_type', 3)->with('user:id,email,name')->get()]);
    }

    public function findImssoDetails($id) {
      $imsso = IMSSO::find($id);
      $payment = Payment::where('user_id', $imsso->user_id)->where('tipe_pembayaran', 1)->first();
      return response()->json(['payment' => $payment, 'user_id' => $imsso->user_id,
      'participants' => $imsso->participants]);
    }

    public function acceptImsso($id) {
      $imsso = IMSSO::find($id);
      $userUpdate =   $imsso->user->update([
          'lomba_verified' => 1
        ]);
      $inamscUpdate = $imsso->update([
        'status_pembayaran' => 1,
        'status_verif' => 1
      ]);
      return response()->json(['message' => 'ok']);
    }

    public function declineImsso($id) {
      $imsso = IMSSO::find($id);
      $userUpdate =   $imsso->user->update([
          'lomba_verified' => -1
        ]);
      $inamscUpdate = $imsso->update([
        'status_pembayaran' => -1,
        'status_verif' => -1
      ]);
      return response()->json(['message' => 'ok']);
    }

    public function downloadGuidelines() {
      $myFile = storage_path("app/public/committee-files/Persyaratan Pendaftaran IMSSO Liga Medika 2019.pdf");
      $headers = array('Content-Type: application/octet-stream','Content-Length: '. filesize($myFile));
      return response()->download(storage_path("app/public/committee-files/Persyaratan Pendaftaran IMSSO Liga Medika 2019.pdf", 'Persyaratan Pendaftaran IMSSO Liga Medika 2019.pdf', $headers));      
    }

    public function downloadTemplates() {
      return response()->download(storage_path("app/public/committee-files/imsso-template.zip"));
    }

}
