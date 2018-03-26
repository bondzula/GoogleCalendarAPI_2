@extends('layout.app')

@section('content')
    <div class="body-wrapper">
        <h1 class="title" >Create Google Calendar Event</h1>
        <div align="center" class="form-wrap">
            <form action="{{ route('calendar.store') }}" method="post">
                {{ csrf_field() }}
                    <p>
                        <label for="name">Name:</label>
                        <input type="text"
                                name="name"
                                placeholder="First Name"
                                pattern="^[a-zA-z]{2,10}"
                                title="Name is required"
                                required>
                    </p>
                    @if ($errors->has('name'))
                        <small class="error">{{ $errors->first('name') }}</small>
                    @endif
                    <p>
                        <label for="phone">Phone:</label>
                        <input type="tel"
                                name="phone"
                                placeholder="Phone"
                                pattern="^[0-9\-\+\s\(\)]*$"
                                title="Phone is required"
                                required>
                    </p>
                    @if ($errors->has('phone'))
                        <small class="error">{{ $errors->first('phone') }}</small>
                    @endif
                    <p>
                        <label for="email">Email:</label>
                        <input type="email"
                                name="email"
                                placeholder="something@smt.dev"
                                pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,3}$"
                                title="Email is required"
                                required>
                    </p>
                    @if ($errors->has('email'))
                        <small class="error">{{ $errors->first('email') }}</small>
                    @endif
                    <p>
                        <label for="time">Time:</label>
                        <input type="time"
                                name="time"
                                required>
                    </p>
                    @if ($errors->has('time'))
                        <small class="error">{{ $errors->first('time') }}</small>
                    @endif
                    <p>
                        <label for="date">Date:</label>
                        <input type="date"
                                name="date"
                                min="<?php echo date('Y-m-d'); ?>" required>
                    </p>
                    @if ($errors->has('date'))
                        <small class="error">{{ $errors->first('date') }}</small>
                    @endif
                <textarea name="notes"
                            rows="4"
                            cols="50"
                            placeholder="Note"></textarea>

                <div class="g-recaptcha"
                        data-sitekey="{{env('GOOGLE_RECAPTCHA_KEY')}}">
                </div>
                @if ($errors->has('g-recaptcha-response'))
                    <small class="error">reCaptcha is required</small>
                @endif

                <input type="submit"
                        value="Create Event" >
            </form>
        </div>
    </div>
@endsection