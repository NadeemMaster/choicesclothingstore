<div>
    <div class="row">
        <div class="col-md-12 ">
            @include('inc.fail')
            @include('inc.success')
            <div class="card">
                <div class="card-header">
                    <h3>Contact Us Messages
                        <a href="{{ Route('admindashboard') }}" class="btn btn-primary  float-end text-white">Back</a>
                    </h3>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Name</th>
                                    <th>E-Mail</th>
                                    <th>Subject</th>
                                    <th>Message</th>
                                    <th>Received at</th>
                                </tr>
                            </thead>
                            <tbody>
                                @php
                                    $i = ($messages->currentPage() - 1) * $messages->perPage();
                                @endphp
                                @forelse ($messages as $message)
                                    <tr>
                                        <td>{{ ++$i }}</td>
                                        <td>{{ $message->name }}</td>
                                        <td>{{ $message->email }}</td>
                                        <td>{{ $message->subject }}</td>
                                        <td>{{ $message->message }}</td>
                                        <td>{{ $message->created_at->format('d-M-Y h:i A') }}</td>

                                    </tr>
                                @empty
                                    <tr>
                                        <td class="text-center" colspan="9">
                                            No messages available
                                        </td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                    {{ $messages->links() }}
                </div>
            </div>
        </div>
    </div>
</div>
