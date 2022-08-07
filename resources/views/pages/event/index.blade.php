@extends('adminlte::page')

@section('title', 'Learning activity')

@section('content_header')
    <h1>Learning Activity</h1>
@stop

@section('content')
<div class="col-lg-12">
    <div class="card">
        <div class="card-body">
            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
            <div class="row">
                <div class="col-3">
                    <button type="button" class="btn btn-primary mt-3 ml-3" onclick="resetForm()" data-toggle="modal" data-target="#InputModal">+ Learning activity</button>
                </div>
                <div class="form-inline col-7">
                    <label for="filter_status" class="col-sm-3 col-form-label">Status</label>
                    <div class="col-sm-8">
                        <select class="form-control" id="filter_status" name="filter_status" onchange="loadList()">
                            <option value="">-- Pilih --</option>
                            <option value="Berlangsung">Berlangsung</option>
                            <option value="Selesai">Selesai</option>
                            <option value="Akan Datang">Akan Datang</option>
                        </select>
                    </div>
                </div>
            </div>
            <div class="table-responsive mt-4">
                <table id="event" class="table table-bordered table-striped">
                    <thead>
                        <tr>
                            <th>Metode</th>
                            <th>Januari</th>
                            <th>Februari</th>
                            <th>Maret</th>
                            <th>April</th>
                            <th>Mei</th>
                            <th>Juni</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody id="content_result">

                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
<!-- Modal -->
<div class="modal fade" id="InputModal" aria-labelledby="InputModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="InputModalLabel">Input Form</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form method="POST" action="{{ url('event/save') }}" id="formEvent">
        <input type="hidden" name="_token" value="{{ csrf_token() }}">
        <input type="hidden" id="event_id" name="event_id">
        <input type="hidden" id="event_detail_id" name="event_detail_id">
        <div class="modal-body">
          <div class="form-group row">
            <label for="method" class="col-sm-3 col-form-label">Metode</label>
            <div class="col-sm-8">
                <input type="text" required class="form-control" id="method" name="method">
            </div>
          </div>
          <div class="form-group row">
            <label for="name" class="col-sm-3 col-form-label">Name</label>
            <div class="col-sm-8">
                <input type="text" required class="form-control" id="name" name="name">
            </div>
          </div>
          <div class="form-group row">
            <label for="from_date" class="col-sm-3 col-form-label">From</label>
            <div class="col-sm-8">
                <input type="text" class="form-control date-picker" autocomplete="off" id="from_date" name="from_date">
            </div>
          </div>
          <div class="form-group row">
            <label for="to_date" class="col-sm-3 col-form-label">To</label>
            <div class="col-sm-8">
                <input type="text" class="form-control date-picker" autocomplete="off" id="to_date" name="to_date">
            </div>
          </div>
          <div class="form-group row">
            <label for="status" class="col-sm-3 col-form-label">Status</label>
            <div class="col-sm-8">
                <select class="form-control" id="status" name="status">
                    <option value="Berlangsung">Berlangsung</option>
                    <option value="Selesai">Selesai</option>
                    <option value="Akan Datang">Akan Datang</option>
                </select>
            </div>
          </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" onclick="resetForm()" data-dismiss="modal">Close</button>
          <button type="button" onclick="saveEvent()" id="submitEvent" class="btn btn-primary">Save</button>
        </div>
      </form>
    </div>
  </div>
</div>
<input type="hidden" id="year" value="{{ date('Y') }}">
@stop

@section('css')
@stop

@section('js')
<script type="text/javascript">
$(document).ready(function(){
  $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
  });
  loadList();

  var removeDisabledMonths = function() {
    setTimeout(function() {

        var monthsToDisable = [6,7,8,9,10,11];

        $.each(monthsToDisable, function(k, month) {
            var i = $('#ui-datepicker-div select.ui-datepicker-month').find('option[value="'+month+'"]').remove();
        });

    }, 100);
  };

  $(function() {
        let from_month = '0';
        let to_month = '5';

        $('.date-picker').datepicker({
        changeMonth: true,
        defaultDate: new Date($('#year').val(), from_month, '01'),
        // changeYear: true,
        showButtonPanel: true,
        dateFormat: 'dd/mm/yy',
        minDate: new Date($('#year').val(), from_month, '01'),
        maxDate: new Date($('#year').val(), to_month, '30')
        });
    });
});

function loadList() {
    const page_url = '{{ url('event/get-data') }}';

    $.ajax({
        url: page_url,
        type: 'GET',
        data: { filter_status : $('#filter_status').val()},
        success: function(data) {
            $('#content_result').html(data);
        }
    });
}

function edit(e) {
        $('#event_id').val($(e).data('event_id'));
        $('#method').val($(e).data('method'));
        $('#event_detail_id').val($(e).data('event_detail_id'));
        $('#name').val($(e).data('name'));
        $('#from_date').val($(e).data('from_date'));
        $('#to_date').val($(e).data('to_date'));
        $('#status').val($(e).data('status'));
    }

function tambahEvent(event_id, method) {
    $('#event_id').val(event_id);
    $('#method').val(method);
}

  function saveEvent()
  {
    let event_id = document.getElementById('event_id').value;
    let event_detail_id = document.getElementById('event_detail_id').value;
    let method = document.getElementById('method').value;
    let name = document.getElementById('name').value;
    let from_date = document.getElementById('from_date').value;
    let to_date = document.getElementById('to_date').value;
    let status = document.getElementById('status').value;

    if(event_id != '') {
        var url = "{{ url('event/update/') }}/"+event_id;
    } else {
        var url = "{{ url('event/save') }}";
    }

    if(method == ''){
          Swal.fire("Error!", "Method is required", "error");
    }else if(name == ''){
        Swal.fire("Error!", "Name event is required", "error");
    }else{
        // swalLoading();
           document.getElementById("submitEvent").disabled = true;
            var form_data = new FormData();
                form_data.append('event_id', event_id);
                form_data.append('method', method);
                form_data.append('event_detail_id', event_detail_id);
                form_data.append('name', name);
                form_data.append('from_date', from_date);
                form_data.append('to_date', to_date);
                form_data.append('status', status);
                if(event_id != '') {
                    form_data.append('_method', 'PUT');
                }
                // form_data.append('slug', slug);

            $.ajax({
                type: "POST",
                url: url,
                beforeSend: function (xhr) {
                    var token = $('meta[name="csrf_token"]').attr('content');

                    if (token) {
                        return xhr.setRequestHeader('X-CSRF-TOKEN', token);
                    }
                },
                data: form_data,
                dataType: "json",
                contentType: false,
                cache : false,
                processData : false,
                success: function(result){
                    document.getElementById("submitEvent").disabled = false;

                    if(result.status != "") {
                        Swal.fire("Success!", result.message, "success");
                        loadList();

                    } else {
                        Swal.fire("Error!", result.message, "error");
                    }
                } ,error: function(xhr, status, error) {
                    Swal.fire("Error!", xhr.responseJSON.message, "error");
                    document.getElementById("submitEvent").disabled = false;
                },

            });
       }
  }

    function deleteEvent(id){
        var url = "{{url('event/destroy')}}"+"/"+id;
        Swal.fire({
            title: 'Are you sure?',
            text: "this action will delete this data !",
            // type: 'warning',
            showCancelButton: true,
            showCloseButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33'
                }).then((result) => {
                if (result.value) {
                    $.ajax({
                        type: "POST",
                        url: url,
                        beforeSend: function (xhr) {
                            var token = $('meta[name="csrf_token"]').attr('content');

                            if (token) {
                                return xhr.setRequestHeader('X-CSRF-TOKEN', token);
                            }
                        },
                        dataType: "json",
                        contentType: false,
                        cache : false,
                        processData : false,
                        success: function(result){
                            if(result.message != "") {
                                Swal.fire("Success!", result.message, "success");
                                loadList();
                            } else {
                                Swal.fire("Error!", result.message, "error");
                            }
                        } ,error: function(xhr, status, error) {
                            console.log(xhr.responseJSON.message);
                        },

                    });
                }else{

                    }
            })
    }

function resetForm(){
    $('#event_id').val('');
    $('#event_detail_id').val('');
    $('#method').val('');
    $('#name').val('');
    $('#from_date').val('');
    $('#to_date').val('');
    $('#status').val('Berlangsung');
    $('#formEvent').trigger("reset");
}
</script>
@stop
