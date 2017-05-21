<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <title></title>
        <link rel="stylesheet" href="//cdn.datatables.net/1.10.15/css/jquery.dataTables.min.css">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    </head>
    <body>

        <div class="container">
            <table id="users_table" class="table table-striped">
                <thead>
                    <tr>
                        <th>Name</th>
                        <th>Email</th>
                    </tr>
                </thead>

                <tbody>
                    @foreach ($users as $user)
                        <tr>
                            <td>{{ $user->name }}</td>
                            <td>{{ $user->email }}</td>

                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>

        <script src="{{ asset('js/app.js') }}" charset="utf-8"></script>    <!--JQuery-->
        <script src="//cdn.datatables.net/1.10.15/js/jquery.dataTables.min.js" charset="utf-8"></script>    <!--Datatable-->
        <script src="https://cdn.datatables.net/1.10.15/js/dataTables.bootstrap.min.js" charset="utf-8"></script>   <!--Styling-->
        <script type="text/javascript">
        $(document).ready(function(){
                $('#users_table').DataTable();      
                });
        </script>

    </body>
</html>
