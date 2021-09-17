@extends('adminlte::page')

@section('title', 'City')

@section('content_header')
    <h1>City</h1>
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
              <button type="button" class="btn btn-primary mt-3 ml-3" onclick="resetForm()" data-toggle="modal" data-target="#InputModal">+ Add</button>
            </div>
            <div class="table-responsive mt-4">
                <table id="city" class="table table-bordered table-striped">
                    <thead>
                        <tr>
                            <th>Name</th>
                            <th>Slug</th>
                            <th>Created By</th>
                            <th>Last Modified By</th>
                            <th>Created At</th>
                            <th>Modified At</th>
                            <th>Published</th>
                            <th>Action</th>
                        </tr>
                    </thead>

                </table>
            </div>
        </div>
    </div>
</div>
<!-- Modal -->
<div class="modal fade" id="InputModal" aria-labelledby="InputModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="InputModalLabel">Input Form</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form method="POST" action="{{ url('admin/city/save') }}" id="formCity">
        <input type="hidden" name="_token" value="{{ csrf_token() }}">
        <div class="modal-body">
          <div class="form-group row">
            <input type="hidden" id="id" name="id">
            <label for="name" class="col-sm-3 col-form-label">Name</label>
            <div class="col-sm-8">
                <input type="text" class="form-control" id="name" name="name">
            </div>
          </div>
          <div class="form-group row">
            <label for="slug" class="col-sm-3 col-form-label">Slug</label>
            <div class="col-sm-8">
                <input type="text" class="form-control" id="slug" slug="name">
            </div>
          </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
          <button type="button" onclick="saveCity()" data-dismiss="modal" id="submitCity" class="btn btn-primary">Save</button>
        </div>
      </form>
    </div>
  </div>
</div>
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

});

function loadList() {
    const page_url = '{{ url('admin/city/get-data') }}';

    $.fn.dataTable.ext.errMode = 'ignore';
    var table = $('#city').DataTable({
        processing: true,
        serverSide: true,
        "bDestroy": true,
        ajax: {
            url: page_url,
        },
        columns: [
            {data: 'name', name: 'name'},
            {data: 'slug', name: 'slug'},
            {data: 'created_by', name: 'created_by'},
            {data: 'last_modified_by', name: 'last_modified_by'},
            {data: 'created_at', name: 'created_at'},
            {data: 'updated_at', name: 'updated_at'},
            { "data": null,"sortable": false,
                render: function (data, type, row, meta) {
                    var checked = '';
                    var published = 0;

                    if(row.published == 1) {
                        checked = 'checked';
                        published = 1;
                    }


                    var result = '<div class="form-check">\
                                    <input type="checkbox" name="published'+row.id+'" id="published'+row.id+'" tabindex="0" onchange="savePublished('+row.id+')" '+checked+'>\
                                    <input type="hidden" name="value_published'+row.id+'" id="value_published'+row.id+'" value="'+published+'"></div>';

                        return result;
                }
            },
            { "data": null,"sortable": false,
                render: function (data, type, row, meta) {
                    var result = '<a class="btn btn-success btn-sm" \
                                    data-id = '+row.id+' \
                                    data-name = '+row.name+' \
                                    data-slug = '+row.slug+' \
                                onclick="editCity(this)" data-toggle="modal" data-target="#InputModal"><i class="fa fa-pencil"></i> edit</a>&nbsp;';
                    result += '<a class="btn btn-warning btn-sm" onclick="destroy('+row.id+')"><i class="fa fa-pencil"></i> Delete</a>';
                        return result;
                }
            }
        ],
        responsive: true,
        oLanguage: {
            sLengthMenu: "_MENU_",
            sSearch: ""
        },
        aLengthMenu: [[4, 10, 15, 20], [4, 10, 15, 20]],
        order: [[1, "asc"]],
        pageLength: 10,
        buttons: [
        ],
        initComplete: function (settings, json) {
            $(".dt-buttons .btn").removeClass("btn-secondary")
        },
        drawCallback: function (settings) {
            console.log(settings.json);
        }
    });

}

function editCity(e) {
        $('#id').val($(e).data('id'));
        $('#name').val($(e).data('name'));
        $('#slug').val($(e).data('slug'));
    }

  function saveCity()
  {
    let id = document.getElementById('id').value;
    let name = document.getElementById('name').value;
    let slug = document.getElementById('slug').value;

    var url = "{{ url('admin/city/save') }}";

    if(name == ''){
          Swal.fire("Error!", "Name is required", "error");
       }else{
        // swalLoading();
           document.getElementById("submitCity").disabled = true;
            var form_data = new FormData();
                form_data.append('id', id);
                form_data.append('name', name);
                form_data.append('slug', slug);

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
                    document.getElementById("submitCity").disabled = false;

                    if(result.status != "") {
                        Swal.fire("Success!", result.message, "success");
                        loadList();

                    } else {
                        Swal.fire("Error!", result.message, "error");
                    }
                } ,error: function(xhr, status, error) {
                    Swal.fire("Error!", xhr.responseJSON.message, "error");
                    document.getElementById("submitCity").disabled = false;
                },

            });
       }
  }


  function savePublished(id)
  {
    var url = "{{ url('admin/city/save_published') }}";

    let published = 0;
    if($('#value_published'+id).val() == 0) {
        published = 1;
        $('#published'+id).prop('checked', true);
    } else {
        published = 0;
        $('#published'+id).prop('checked', false);
    }
    $('#value_published'+id).val(published);

    if(id == ''){
          Swal.fire("Error!", "Id is required", "error");
       }else{
            var form_data = new FormData();
                form_data.append('id', id);
                form_data.append('published', published);

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
                    Swal.fire("Success!", result.message, "success");
                    loadList();
                } ,error: function(xhr, status, error) {
                    Swal.fire("Error!", xhr.responseJSON.errors.name[0], "error");
                },

            });
       }
  }

    function destroy(id){
        var url = "{{url('admin/city/destroy')}}"+"/"+id;
        Swal.fire({
            title: 'Are you sure?',
            text: "this action will delete this data !",
            type: 'warning',
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
    $('#id').val('');
    $('#formCity').trigger("reset");
}
</script>
@stop
