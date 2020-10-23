@extends('layouts.dashboard')

@section('content')
    <div class="row justify-content-start">
    @foreach ($machineStates as $machineState)
        <div class="col-4">
            <div class="card card-bottom" style="width: 18rem;">
                <div class="card-header bg-dark text-white text-center text-uppercase">
                    {{ $machineState->getMachine()->getName() }}
                </div>
                <ul class="list-group list-group-flush">
                    <li class="list-group-item list-group-item-success text-center">
                        @if ($machineState->isAvailable())
                            Available
                        @else
                            Occupied
                            @if ($machineState->isBookedByMe())
                                <span class="flaticon-avatar"></span>
                            @endif
                        @endif
                        <br />
                        <span class="small">{{ $machineState->getStateString() }}</span>
                    </li>
                    @isset ($bookings[$machineState->getMachine()->getId()])
                        @forelse ($bookings[$machineState->getMachine()->getId()] as $booking)
                            <li class="list-group-item">{{ $booking->getDatetime()->format('l, M jS H:i') }}</li>
                        @empty
                            <li class="list-group-item text-muted text-center text-uppercase small">No bookings</li>
                        @endforelse
                    @endisset
                </ul>
            </div>
        </div>
    @endforeach
    </div>

    <small>Icons designed by:
        <a href="https://www.flaticon.com/free-icon/avatar_126486" target="_blank">Avatar</a> by <a href="https://www.flaticon.com/free-icon/avatar_126486" target="_blank">Gregor Cresnar</a> -
        <a href="https://www.flaticon.com/free-icon/wash_788554" target="_blank">Washer</a>,
        <a href="https://www.flaticon.com/free-icon/tumble-dry_788555" target="_blank">Dryer</a> by <a href="https://www.flaticon.com/authors/those-icons" target="_blank">Those Icons</a>
    </small>
@endsection
