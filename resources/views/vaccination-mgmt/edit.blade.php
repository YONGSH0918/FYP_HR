@extends('vaccination-mgmt.base')

@section('action-content')

<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading" style="font-size: larger; color: mediumblue; font-weight: 500;">Edit Vaccination Appointment Information
                    <a href="{{ route('viewVA') }}" class="float-right btn btn-info col-sm-3 col-xs-5 btn-margin" style="font-size: initial; width: 110px;">
                        <i></i>{{ __('Back') }}
                    </a>
                </div>
                <div class="panel-body">
                    <form name="formEditVA" class="form-horizontal" role="form" method="POST" action="{{ route('updateVA') }}" enctype="multipart/form-data" onSubmit="return formValidation();">
                        @csrf
                        @foreach($vas as $va)
                        <input type="hidden" name="ID" id="ID" value="{{$va->id}}" style="width: -webkit-fill-available;">
                        <!--VA ID -->
                        <div class="form-group">
                            <label for="employee_Vaccination_ID" class="col-md-4 control-label">Vaccination Appointment ID<span style="color:red">*</span></label>
                            <div class="col-md-6">
                                <input type="text" name="employee_Vaccination_ID" id="employee_Vaccination_ID" value="{{$va->employee_Vaccination_ID}}" style="width: -webkit-fill-available;" readonly>
                            </div>
                        </div>
                        <!--Employee ID -->
                        <div class="form-group">
                            <label for="employee_ID" class="col-md-4 control-label">Employee ID<span style="color:red">*</span></label>
                            <div class="col-md-6">
                                <input type="text" name="employee_ID" id="employee_ID" value="{{$va->employee_ID}}" style="width: -webkit-fill-available;" readonly>
                            </div>
                        </div>
                        <!--Employee Name -->
                        <div class="form-group">
                            <label for="employee_Name" class="col-md-4 control-label">Employee Name<span style="color:red">*</span></label>
                            <div class="col-md-6">
                                <input type="text" name="employee_Name" id="employee_Name" value="{{$va->employee_Name}}" style="width: -webkit-fill-available;" readonly>
                            </div>
                        </div>
                        <!--Employee IC -->
                        <div class="form-group">
                            <label for="employee_IC" class="col-md-4 control-label">Identification Card Number<span style="color:red">*</span></label>
                            <div class="col-md-6">
                                <input type="text" name="employee_IC" id="employee_IC" value="{{$va->ic}}" style="width: -webkit-fill-available;" readonly>
                            </div>
                        </div>
                        <!--Vaccine Name-->
                        <div class="form-group">
                            <label for="vaccine_Type" class="col-md-4 control-label">Vaccine Name<span style="color:red">*</span></label>
                            <div class="col-md-6">
                                <select id="vaccine_Type" name="vaccine_Type" style="width: -webkit-fill-available;" onchange="if (this.value=='Others'){this.form['Others'].style.visibility='visible'}else {this.form['Others'].style.visibility='hidden'};">
                                    <option value="Pfizer - BioNTech" @if($va->status == "Pfizer") checked @endif>Pfizer - BioNTech</option>
                                    <option value="Sinovac - Coronavac" @if($va->status == "Sinovac") checked @endif>Sinovac - Coronavac</option>
                                    <option value="AstraZeneca" @if($va->status == "AstraZeneca") checked @endif>AstraZeneca</option>
                                    <option value="Sinopharm - Covilo" @if($va->status == "Sinopharm") checked @endif>Sinopharm - Covilo</option>
                                    <option value="Others" @if($va->status == "Others") checked @endif>Others</option>
                                </select>
                                <input type="text" name="Others" id="vaccine_Type" value="{{$va->vaccine_Type}}" style="visibility:hidden; width: -webkit-fill-available;" />
                            </div>
                        </div>
                        <!--Health Facility-->
                        <div class="form-group">
                            <label for="health_Facility" class="col-md-4 control-label">Health Facility<span style="color:red">*</span></label>
                            <div class="col-md-6">
                                <select name="health_Facility" id="health_Facility" class="form-control">
                                    @foreach($hfs as $hf)
                                    <option value="{{ $hf->id }}" @if($va->health_Facility==$hf->name)
                                        selected
                                        @endif
                                        >{{ $hf->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <!--Vaccination Location-->
                        <div class="form-group">
                            <label for="vaccination_Location" class="col-md-4 control-label">Vaccination Location<span style="color:red">*</span></label>
                            <div class="col-md-6">
                                @foreach($hfs as $hf)
                                <textarea id="vaccination_Location" value="{{ $hf->id }}" name="vaccination_Location" style="width: -webkit-fill-available;" readonly>{{ $hf->address }}</textarea>
                                @endforeach
                            </div>
                        </div>
                        <!--Date Time-->
                        <div class="form-group">
                            <label for="vaccination_DateTime" class="col-md-4 control-label">Date Time<span style="color:red">*</span></label>
                            <div class="col-md-6">
                                <input type="datetime-local" id="vaccination_DateTime" name="vaccination_DateTime" value="{{$va->vaccination_DateTime}}" style="width: -webkit-fill-available;" required>
                            </div>
                        </div>
                        <!--Status-->
                        <div class="form-group">
                            <label for="vaccination_Status" class="col-md-4 control-label">Status<span style="color:red">*</span></label>
                            <div class="col-md-6">
                                <select id="vaccination_Status" name="vaccination_Status" style="width: -webkit-fill-available;" onchange="if (this.value=='others'){this.form['others'].style.visibility='visible'}else {this.form['others'].style.visibility='hidden'};">
                                    <option value="Vaccinated" @if($va->vaccination_Status == "Vaccinated") checked @endif>Vaccinated</option>
                                    <option value="Unvaccinated" @if($va->vaccination_Status == "Unvaccinated") checked @endif>Unvaccinated</option>
                                    <option value="others" @if($va->vaccination_Status == "others") checked @endif>Others</option>
                                </select>
                                <input type="text" name="others" id="vaccination_Status" value="{{$va->vaccination_Status}}" style="visibility:hidden; width: -webkit-fill-available;" />
                            </div>
                        </div>
                        @endforeach
                        <div class="form-group">
                            <div class="col-md-6 col-md-offset-4">
                                <button type="submit" name="edit" class="btn btn-primary" onclick="return confirm('Sure Want To Edit?')">
                                    Update
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection