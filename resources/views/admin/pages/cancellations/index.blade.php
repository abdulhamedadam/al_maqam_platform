@extends('admin.layouts.master')

@section('title', 'Appointment Cancellations')

@section('content')

<div class="container-fluid">
    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Appointment Cancellations</h1>
    </div>

    <!-- Cancellations Table -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">All Cancellations</h6>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>Course</th>
                            <th>Teacher</th>
                            <th>Student</th>
                            <th>Day</th>
                            <th>Time</th>
                            <th>Cancelled By</th>
                            <th>Reason</th>
                            <th>Cancelled At</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($cancellations as $cancellation)
                            <tr>
                                <td>{{ $cancellation->appointment->course->name ?? 'N/A' }}</td>
                                <td>{{ $cancellation->appointment->teacher->name ?? 'N/A' }}</td>
                                <td>{{ $cancellation->appointment->student->name ?? 'N/A' }}</td>
                                <td>{{ $cancellation->appointment->day ?? 'N/A' }}</td>
                                <td>
                                    @if($cancellation->appointment)
                                        {{ format_time_arabic($cancellation->appointment->start_time) }}
                                        to
                                        {{ format_time_arabic($cancellation->appointment->end_time) }}
                                    @else
                                        N/A
                                    @endif
                                </td>
                                <td>
                                    <span class="badge {{ $cancellation->cancelled_by_type === 'teacher' ? 'bg-info' : 'bg-warning' }}">
                                        {{ ucfirst($cancellation->cancelled_by_type) }}
                                    </span>
                                </td>
                                <td>{{ $cancellation->reason }}</td>
                                <td>{{ $cancellation->created_at->format('Y-m-d H:i:s') }}</td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="8" class="text-center">No cancellations found</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>

                <div class="d-flex justify-content-center mt-4">
                    {{ $cancellations->links() }}
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
