<!-- Create Staffs Modal -->
<div id="createVetStaffModal" class="modal">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
           <!-- Modal Header -->
            <div class="modal-header">
                <h4 class="modal-title">Pružatelj veterinarske usluge</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            </div>
            <!-- Modal body -->
            <form id="createVetStaff" action="{{ route('shelter_vet_staff.store') }}" method="POST" enctype="multipart/form-data">
            <div class="modal-body">
             
                @csrf
                <div id="dangerVetStaffCreate" class="alert alert-danger alert-dismissible fade show" role="alert" style="display: none;">
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div id="successVetStaffCreate" class="alert alert-success alert-dismissible fade show" role="alert" style="display: none;">
                    <strong>Uspjeh!</strong> Pružatelj veterinarske usluge uspješno kreiran.
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>

                <div class="form-group doctor">
                  <div class="form-check">
                    <label class="form-check-label">
                      <input type="radio" class="form-check-input staff_vet_type" name="staff_vet_type" id="staffVetType" value="doctor">
                      Veterinar oporavilišta
                    <i class="input-frame"></i></label>
                  </div>

                  <div class="form-check ambulance">
                    <label class="form-check-label">
                      <input type="radio" class="form-check-input staff_vet_type" name="staff_vet_type" id="staffVetType" value="out_doctor">
                      Vanjski pružatelj veterinarske usluge
                    <i class="input-frame"></i></label>
                  </div>
                 </div>
      
                <div class="form-group">
                  <label for="name">Ime i prezime</label>
                  <input type="text" class="form-control"  name="staff_vet_name" placeholder="Ime i prezime doktora veterinarske medicine">
                  <input type="hidden" name="shelter_id" value="{{ $shelter->id }}">
                 </div>

                 <div class="form-group">
                  <label for="name">Naziv veterinarske ambulante</label>
                  <input type="text" class="form-control"  name="staff_vet_ambulance" placeholder="Naziv veterinarske ambulante/organizacije">
                  <input type="hidden" name="shelter_id" value="{{ $shelter->id }}">
                 </div>
  
                <div class="form-group"> 
                  <label for="name">OIB</label>
                  <input type="text" class="form-control" name="staff_vet_oib" placeholder="OIB">
                </div>
  
                <div class="form-group"> 
                  <label for="name">Adresa sjedišta/prebivališta</label>
                  <input type="text" class="form-control"  name="staff_vet_address" autocomplete="off" placeholder="adresa prebivališta">
                </div>
                <div class="form-group"> 
                  <label for="name">Adresa boravišta</label>
                  <input type="text" class="form-control"  name="staff_vet_address_place" autocomplete="off" placeholder="Adresa boravišta(ako postoji)">
                </div>
  
                <div class="form-group"> 
                  <label for="name">Kontakt telefon</label>
                  <input type="text" class="form-control" name="staff_vet_phone" autocomplete="off" placeholder="Kontakt telefon">          
                </div>
  
                <div class="form-group"> 
                  <label for="name">Kontakt mobilni telefon</label>
                  <input type="text" class="form-control"  name="staff_vet_phone_cell" autocomplete="off" placeholder="Kontakt mobitel">
                </div>
  
                <div class="form-group">
                  <label for="email">Email adresa</label>
                  <input type="email" class="form-control"  name="staff_vet_email" id="staffEmail" placeholder="Email">
                </div>
  
                <div class="form-group doctor staff_form_group">
                  <label>Kopija diplome doktora veterinarske medicine</label>
                  <input type="file" name="staff_vet_diploma" class="file-upload-default">
                  <div class="input-group col-xs-12">
                  <input type="text" class="form-control file-upload-info"  placeholder="Kopija diplome doktora veterinarske medicine">
                  <span class="input-group-append">
                      <button class="file-upload-browse btn btn-primary" type="button">Učitaj</button>
                  </span>
                  </div>
                </div> 

                <div class="form-group doctor staff_form_group">
                  <label>Kopija ugovora o radu ili drugog sporazuma</label>
                  <input type="file" name="staff_vet_contract" class="file-upload-default">
                  <div class="input-group col-xs-12">
                  <input type="text" class="form-control file-upload-info"  placeholder="Kopija ugovora o radu ili drugog sporazuma">
                  <span class="input-group-append">
                      <button class="file-upload-browse btn btn-primary" type="button">Učitaj</button>
                  </span>
                  </div>
                </div> 

                <div class="form-group ambulance staff_form_group">
                  <label>Kopija ugovora o radu ili drugog sporazuma</label>
                  <input type="file" name="staff_ambulance_contract" class="file-upload-default">
                  <div class="input-group col-xs-12">
                  <input type="text" class="form-control file-upload-info"  placeholder="Kopija ugovora ili drugog sporazuma između oporavilišta i vanjskog pružatelja usluge">
                  <span class="input-group-append">
                      <button class="file-upload-browse btn btn-primary" type="button">Učitaj</button>
                  </span>
                  </div>
                </div> 
            </div>
            <!-- Modal footer -->
          <div class="modal-footer">
            <button type="submit" class="submitBtn btn btn-warning">Spremi</button>
            <button type="button" class="btn btn-primary modal-close" data-dismiss="modal">Zatvori</button>
          </div>
        </form>
    </div>
  </div>
</div>