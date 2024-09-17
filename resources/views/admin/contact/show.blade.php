@extends('admin.admin_master')
@section('content')

 <div class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-10 offset-sm-1">

                <div class="alert alert-success" style="display: none;"></div>
                {{-- data table --}}
                   <div class="card card-primary">
                      <div class="card-header">
                        <h5>Contact Message List
                            <a href="" class="btn btn-danger" id="deleteAllSelectedRecord" style="float: right;">Delete  Selected Messages</a>
                        </h5>
                      </div>

                      <div class="card-body">
                        @if (count($messages)>0)
                        <table  class="table table-striped table-bordered table-sm" style="width:100%">
                            <thead>
                                <tr class="text-center">
                                    <th>
                                        <input type="checkbox" id="select_all_ids">
                                    </th>
                                    <th class="text-center">Sl no.</th>
                                    <th class="text-center">Sender Name</th>
                                    <th class="text-center">Email</th>
                                    <th class="text-center">Message</th>
                                    <th class="text-center">Status</th>
                                    <th class="text-center">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                               @foreach ($messages as $key=>$row)
                                   <tr class="text-center" id="message_ids{{ $row->id }}">
                                    <td>
                                        <input type="checkbox" name="ids" class="checkbox_ids" value="{{ $row->id }}">
                                    </td>
                                     <td>{{ $key+1 }}</td>
                                     <td>{{ $row->name }}</td>
                                     <td>{{ $row->email }}</td>
                                     <td>{{ Str::limit($row->message,20) }}</td>
                                     <td>
                                        @if ($row->status=='0')
                                            <span class="text-danger">Pending</span>
                                        @endif

                                        @if ($row->status=='1')
                                            <span class="text-success">Already Seen</span>
                                        @endif
                                     </td>
                                     <td>
                                        <a href="{{ route('admin.message.view',$row->id) }}" class="btn btn-info btn-sm" title="View message"><i class="fa fa-eye"></i></a>
                                     </td>
                                   </tr>
                               @endforeach
                            </tbody>
                        </table>
                        @else
                           <h4 class="text-danger text-center">No message found.....</h4>
                        @endif

                        <div class="mt-3">
                            {{ $messages->links() }}
                        </div>
                      </div>
                   </div>
                {{-- data table end --}}
            </div>
        </div>
    </div>
 </div>

 {{-- delete multiple records start --}}
 <script>
    $(document).ready(function(){
        $('#select_all_ids').click(function(){
            $('.checkbox_ids').prop('checked',$(this).prop('checked'));
        });

        $('#deleteAllSelectedRecord').click(function(e){
            e.preventDefault();
            var all_ids = [];
            $('input:checkbox[name=ids]:checked').each(function(){
                all_ids.push($(this).val());
            });

          $.ajax({
            url:"{{ route('delete') }}",
            method:'POST',
            data:{ids:all_ids},
            success:function(response){
                //alert('success');
                $('.alert').show();
                $('.alert').html(response.status);
                 $.each(all_ids, function(index, id) {
                    $('#message_ids' + id).remove();
                });

                 //$('.table').load(location.href+' .table');
                 updateSerialNumbers();


            },
          });
        });

        function updateSerialNumbers() {
        var $i = 1;
        $('.table tbody tr').each(function() {
            $(this).find('td:nth-child(2)').text($i++);
        });
    }
    });
</script>
 {{-- delete multiple records end --}}


@endsection
