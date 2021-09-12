@extends('vaccination-mgmt.base')

@section('action-content')

<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading" style="font-size: larger; color: mediumblue; font-weight: 500;">Add New Vaccination Appointment
                    <a href="{{ route('viewEmployeeVA') }}" class="float-right btn btn-info col-sm-3 col-xs-5 btn-margin" style="font-size: initial; width: 110px;">
                        <i></i>{{ __('Back') }}
                    </a>
                </div>
                <div class="panel-body">
                    <form name="formAddVA" class="form-horizontal" role="form" method="POST" action="{{ route('addVA') }}" enctype="multipart/form-data" onSubmit="return formValidation();">
                        {{ csrf_field() }}

                        <!--VA ID -->
                        <div class="form-group">
                            <label for="employee_Vaccination_ID" class="col-md-4 control-label">Vaccination Appointment ID<span style="color:red">*</span></label>
                            <div class="col-md-6">
                                <input type="text" name="employee_Vaccination_ID" id="employee_Vaccination_ID" style="width: -webkit-fill-available;" required>
                            </div>
                        </div>
                        <!--Employee ID -->
                        <div class="form-group">
                            <label for="employee_ID" class="col-md-4 control-label">Employee ID<span style="color:red">*</span></label>
                            <div class="col-md-6">
                                @foreach($employees as $employee)
                                <input type="hidden" name="ID" id="ID" value="{{$employee->id}}" style="width: -webkit-fill-available;">
                                <input type="text" name="employee_ID" id="employee_ID" value="{{$employee->employee_ID}}" style="width: -webkit-fill-available;" readonly>
                                @endforeach
                            </div>
                        </div>
                        <!--Employee Name -->
                        <div class="form-group">
                            <label for="employee_Name" class="col-md-4 control-label">Employee Name<span style="color:red">*</span></label>
                            <div class="col-md-6">
                                @foreach($employees as $employee)
                                <input type="hidden" name="ID" id="ID" value="{{$employee->id}}" style="width: -webkit-fill-available;">
                                <input type="text" name="employee_Name" id="employee_Name" value="{{$employee->employee_Name}}" style="width: -webkit-fill-available;" readonly>
                                @endforeach
                            </div>
                        </div>
                        <!--Employee IC -->
                        <div class="form-group">
                            <label for="employee_IC" class="col-md-4 control-label">Identification Card Number<span style="color:red">*</span></label>
                            <div class="col-md-6">
                                @foreach($employees as $employee)
                                <input type="hidden" name="ID" id="ID" value="{{$employee->id}}" style="width: -webkit-fill-available;">
                                <input type="text" name="employee_IC" id="employee_IC" value="{{$employee->ic}}" style="width: -webkit-fill-available;" readonly>
                                @endforeach
                            </div>
                        </div>
                        <!--Vaccine Name-->
                        <div class="form-group">
                            <label for="vaccine_Type" class="col-md-4 control-label">Vaccine Name<span style="color:red">*</span></label>
                            <div class="col-md-6">
                                <select id="vaccine_Type" name="vaccine_Type" style="width: -webkit-fill-available;" onchange="if (this.value=='Others'){this.form['Others'].style.visibility='visible'} else {this.form['Others'].style.visibility='hidden'};">
                                    <option value="Pfizer - BioNTech">Pfizer - BioNTech</option>
                                    <option value="Sinovac - Coronavac">Sinovac - Coronavac</option>
                                    <option value="AstraZeneca">AstraZeneca</option>
                                    <option value="Sinopharm - Covilo">Sinopharm - Covilo</option>
                                    <option value="Others">Others</option>
                                </select>
                                <input type="text" name="Others" id="vaccine_Type" style="visibility:hidden; width: -webkit-fill-available;" />
                            </div>
                        </div>
                        <!--Health Facility-->
                        <div class="form-group">
                            <label for="health_Facility" class="col-md-4 control-label">Health Facility<span style="color:red">*</span></label>
                            <div class="col-md-6">
                                <select name="health_Facility" id="health_Facility" class="form-control healthFacility">
                                    @foreach($healthFacility as $hf)
                                    <option value="{{ $hf->id }}">{{ $hf->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <!--Vaccination Location-->
                        <div class="form-group">
                            <label for="vaccination_Location" class="col-md-4 control-label">Vaccination Location<span style="color:red">*</span></label>
                            <div class="col-md-6">
                                <textarea id="vaccination_Location" name="vaccination_Location" class="healthFacilityAddress" style="width: -webkit-fill-available;" readonly></textarea>
                            </div>
                        </div>
                        <!--Date Time-->
                        <div class="form-group">
                            <label for="vaccination_DateTime" class="col-md-4 control-label">Date Time<span style="color:red">*</span></label>
                            <div class="col-md-6">
                                <input type="datetime-local" id="vaccination_DateTime" name="vaccination_DateTime" style="width: -webkit-fill-available;" required>
                            </div>
                        </div>
                        <!--Status-->
                        <div class="form-group">
                            <label for="vaccination_Status" class="col-md-4 control-label">Status<span style="color:red">*</span></label>
                            <div class="col-md-6">
                                <select id="vaccination_Status" name="vaccination_Status" style="width: -webkit-fill-available;" onchange="if (this.value=='others'){this.form['others'].style.visibility='visible'}else {this.form['others'].style.visibility='hidden'};">
                                    <option value="Vaccinated">Vaccinated</option>
                                    <option value="Unvaccinated">Unvaccinated</option>
                                    <option value="others">Others</option>
                                </select>
                                <input type="text" name="others" id="vaccination_Status" style="visibility:hidden; width: -webkit-fill-available;" />
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-md-6 col-md-offset-4">
                                <button type="submit" class="btn btn-primary">
                                    Create
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

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
<script type="text/javascript">
    $(document).ready(function() {

        $(document).on('change', '.healthFacility', function() {
            //console.log("hmn its change");

            var hf_id = $(this).val();
            //console.log(hf_id);

            var a = $(this).parent();
            console.log(hf_id);
            var op = "";

            $.ajax({
                type: 'get',
                url: "{{ route('findAddress') }}",
                data: {
                    'id': hf_id
                },
                dateType: 'json', //return data will be json
                success: function(data) {
                    console.log("address");
                    console.log(data.address);

                    a.find('.healthFacilityAddress').val(data.address);

                },

                error: function() {

                }
            });

        });

    });
</script>