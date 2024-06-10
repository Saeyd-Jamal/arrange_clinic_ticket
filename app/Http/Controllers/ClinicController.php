<?php

namespace App\Http\Controllers;

use App\Models\Clinic;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;

class ClinicController extends Controller
{
    //
    public function doctorView(Request $request){
        $user = $request->user();
        $clinic = Clinic::where('id','=',$user->clinic_id)->get();
        return view('doctor',compact('clinic'));
    }
    public function getNumTeckit(Request $request){
        $user = $request->user();
        $clinic_db = Clinic::where('id','=',$user->clinic_id)->get();
        $clinic = Clinic::findOrFail($clinic_db[0]['id']);

        if($request->post('type') == 'plus'){
            $clinic->update([
                'num_ticket' => $clinic_db[0]['num_ticket'] + 1,
                'update_last' => true,
            ]);
            return $clinic_db[0]['num_ticket']  + 1 ;
        }

        if($request->post('type') == 'minus'){
            $clinic->update([
                'num_ticket' => $clinic_db[0]['num_ticket'] - 1,
                'update_last' => true,
            ]);
            return $clinic_db[0]['num_ticket']  - 1 ;
        }

        if($request->post('type') == 'num'){

            $clinic->update([
                'num_ticket' => $request->post('val'),
                'update_last' => true,
            ]);
            return  $request->post('val') ;
        }
        $clinic->update([
            'update_last' => false,
        ]);
        return $clinic_db[0]['num_ticket'];
    }

    public function clinicView(){
        $clinics = Clinic::get();
        return view('form_clinics',compact('clinics'));
    }
    public function getClinicView(Request $request){
        $clinics = Clinic::get();
        $num_clinics = $request->post('num_clinics');
        $clinic1 = Clinic::find($request->post('clinic1'));
        $clinic2 = Clinic::find($request->post('clinic2'));
        $clinic3 = Clinic::find($request->post('clinic3'));
        $clinic4 = Clinic::find($request->post('clinic4'));
        $hospital = $request->post('hospital');
        return view('clinicsView',compact('clinics','num_clinics','clinic1','clinic2','clinic3','clinic4','hospital'));
    }

    public function getClinicViewAjax(Request $request){
        $num_clinics = $request->get('num_clinics');
        $sound = false;
        if($num_clinics == 1){
            $clinic1 = Clinic::find($request->get('clinic1'));
            if($clinic1['update_last'] == true){
                $clinic1->update([
                    'update_last' => false,
                ]);
                $sound = true;
            }
            $x = [
                'clinic1' => $clinic1['num_ticket'],
                'sound' => $sound
            ];

            return $x;
        }
        if($num_clinics == 2){
            $clinic1 = Clinic::find($request->get('clinic1'));
            $clinic2 = Clinic::find($request->get('clinic2'));
            if($clinic1['update_last'] == true){
                $clinic1->update([
                    'update_last' => false,
                ]);
                $sound = true;
            }
            if($clinic2['update_last'] == true){
                $clinic2->update([
                    'update_last' => false,
                ]);
                $sound = true;
            }
            $x = [
                'clinic1' => $clinic1['num_ticket'],
                'clinic2' => $clinic2['num_ticket'],
                'sound' => $sound
            ];
            return $x;
        }
        if($num_clinics == 4){
            $clinic1 = Clinic::find($request->get('clinic1'));
            $clinic2 = Clinic::find($request->get('clinic2'));
            $clinic3 = Clinic::find($request->get('clinic3'));
            $clinic4 = Clinic::find($request->get('clinic4'));
            if($clinic1['update_last'] == true){
                $clinic1->update([
                    'update_last' => false,
                ]);
                $sound = true;
            }
            if($clinic2['update_last'] == true){
                $clinic2->update([
                    'update_last' => false,
                ]);
                $sound = true;
            }
            if($clinic3['update_last'] == true){
                $clinic3->update([
                    'update_last' => false,
                ]);
                $sound = true;
            }
            if($clinic4['update_last'] == true){
                $clinic4->update([
                    'update_last' => false,
                ]);
                $sound = true;
            }
            $x = [
                'clinic1' => $clinic1['num_ticket'],
                'clinic2' => $clinic2['num_ticket'],
                'clinic3' => $clinic3['num_ticket'],
                'clinic4' => $clinic4['num_ticket'],
                'sound' => $sound
            ];
            return $x;
        }
    }

    public function doctorsTable(){
        $doctors = User::where('type','=','doctor')->get();
        return view('doctors',compact('doctors'));
    }
    public function clinicsTable(){
        $clinics = Clinic::get();
        return view('clinics',compact('clinics'));
    }
    public function create()
    {
        $clinic = new Clinic();
        return view('clinics.create', [
            'clinic' => $clinic,
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        Clinic::create($request->all());

        return redirect()->route('clinicsTable')
            ->with('success','تم إضافة عيادة جديد');
    }
    /**
     * Display the user's profile form.
     */
    public function edit($id)
    {
        $clinic = Clinic::findOrFail($id);
        return view('clinics.edit', [
            'clinic' => $clinic,
        ]);
    }

    /**
     * Update the user's profile information.
     */
    public function update(Request $request, string $id)
    {
        $clinic = Clinic::findOrFail($id);

        $clinic->update($request->all());

        return Redirect::route('clinicsTable')->with('status', 'تم تحديث بيانات العيادة');
    }

    /**
     * Delete the user's account.
     */
    public function destroy($id)
    {

        $clinic = Clinic::findOrFail($id);

        $clinic->delete();

        return Redirect::route('clinicsTable')->with('status', 'تم حذف العيادة');
    }
}
