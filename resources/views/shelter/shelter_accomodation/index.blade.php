@extends('layout.master')

@push('plugin-styles')
  <link href="{{ asset('assets/plugins/sweetalert2/sweetalert2.min.css') }}" rel="stylesheet" />
  
  <link href="{{ asset('assets/plugins/font-awesome/css/font-awesome.min.css') }}" rel="stylesheet" />
@endpush

@section('content')

<ul class="nav shelter-nav">

  <li class="nav-item">
    <a class="nav-link" href="{{ route('shelter.show', $shelter->id) }}">Oporavilište</a>
  </li>
  <li class="nav-item">
    <a class="nav-link" href="{{ route('shelter.shelter_staff', $shelter->id) }}">Odgovorne osobe</a>
  </li>

  <li class="nav-item">
    <a class="nav-link active" href="{{ route('shelters.accomodations.index', $shelter->id) }}">Smještajne jedinice</a>
  </li>
  <li class="nav-item">
    <a class="nav-link" href="{{ route('shelters.nutritions.index', $shelter->id) }}">Hranjenje životinja</a>
  </li>
  <li class="nav-item">
    <a class="nav-link " href="{{ route('shelters.equipments.index', $shelter->id) }}">Oprema, prijevoz životinja</a>
  </li>
</ul>


<div class="d-flex align-items-center justify-content-between">
  <h5 class="mb-3 mb-md-0">{{ $shelter->name ?? '' }}</h5>
  <div>      
      <a id="createAccomodation" href="{{ route('shelters.accomodations.create', $shelter->id) }}" type="button" class="btn btn-sm btn-primary btn-icon-text">
        Dodaj jedinicu
        <i class="btn-icon-append" data-feather="user-plus"></i>
      </a>                  
  </div>
</div>
<div class="row mt-4">

  <div class="col-lg-12 col-xl-12 stretch-card">
    <div class="card ">
      <div class="card-body">
        <div class="d-flex justify-content-between align-items-baseline mb-2">
          <h6 class="card-title mb-0">Popis smještajnih jedinica</h6>
        </div>
        <div class="table-responsive">
          <table class="table table-hover mb-0">
            <thead>
              <tr>
                
                <th>Oznaka</th>
                <th>Opis oznake</th> 
                <th>Tip jedinice</th>
                <th class="pt-0">Naziv jedinice</th>                    
                <th>Dimenzije</th>
                <th class="pt-0">Akcija</th> 
              </tr>
            </thead>
            <tbody>
              @foreach ($shelterAccomodationItems as $shelterItem)
              <tr>
               
                <td>{{ $shelterItem->accommodationType->type_mark }}</td>
                <td style="width:25%;" class="td-nowrapp">{{ $shelterItem->accommodationType->type_description  }}</td> 
                <td>{{ $shelterItem->accommodationType->name }}</td>
                <td>{{ $shelterItem->name }}</td>
                 
                <td>{{ $shelterItem->dimensions }}</td>
                <td>
                  <div class="d-flex align-items-center">
                    <a href="{{ route('shelters.accomodations.show', [$shelter->id, $shelterItem->id]) }}" class="btn btn-xs btn-info mr-2">
                      Podatci
                    </a>
                
                    <a href="{{ route('shelters.accomodations.edit', [$shelter->id, $shelterItem->id]) }}" class="btn btn-xs btn-primary mr-2">
                      Uredi
                    </a>
                </div>  
                </td>
              </tr>
              @endforeach

            </tbody>
          </table>
        </div>
      </div> 
    </div>
  </div>
</div> <!-- row -->


<div class="modal"></div>
@endsection

@push('plugin-scripts')
  <script src="{{ asset('assets/plugins/sweetalert2/sweetalert2.min.js') }}"></script>
  <script src="{{ asset('assets/plugins/tinymce/tinymce.min.js') }}"></script>
  <script src="{{ asset('assets/plugins/bootstrap-fileinput/fileinput.min.js') }}"></script>
  <script src="{{ asset('assets/plugins/bootstrap-fileinput/lang/cr.js') }}"></script> 
@endpush

@push('custom-scripts')
<script src="{{ asset('assets/js/file-upload.js') }}"></script>
<script src="{{ asset('assets/js/tinymce.js') }}"></script>
<script>
 $(function() {
    // Delete accomodation
    $('body').on('click', '.delete-accomodation', function() {

      var accomodation_id = $(this).data('accomodation-id');
      var shelter_id = $(this).data('shelter-id');

      Swal.fire({
          title: "Brisanje?",
          text: "Potvrdite ako ste sigurni za brisanje!",
          type: "warning",
          showCancelButton: !0,
          confirmButtonText: "Da, brisanje!",
          cancelButtonText: "Ne, odustani!",
          reverseButtons: !0
      }).then(function (e) {

      if (e.value === true) {
                      
          $.ajax({
              type: 'DELETE',
              url: "/shelters/" + shelter_id + "/accomodations/"+ accomodation_id,
              data: {_token: '{{csrf_token()}}'},
              dataType: 'JSON',
              success: function (results) {
                  location.reload();
              }
          });

        } else {
          e.dismiss;
        }

        }, function (dismiss) {
        return false;
        })
    });

});
</script>
@endpush