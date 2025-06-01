@extends('layouts.layout')

@section('content')
    <main class="nxl-container">
        <div class="nxl-content">
            <h1>Edit Student</h1>

            <form action="{{ route('students.update', $student->id) }}" method="POST">
                @csrf
                @method('PUT')

                <div>
                    <label>Number</label>
                    <input type="text" name="number" value="{{ $student->number }}" >
                </div>

                <div>
                    <label>Name</label>
                    <input type="text" name="name" value="{{ $student->name }}" >
                </div>
                <div>
                    <label>A1</label>
                    <input type="text" name="a1" value="{{ $student->a1 }}" >
                </div>
                <div>
                    <label>A2</label>
                    <input type="text" name="a2" value="{{ $student->a2 }}" >
                </div>
                <div>
                    <label>Maj1</label>
                    <input type="text" name="maj1" value="{{ $student->maj1 }}" >
                </div>

                <div>
                    <label>Maj2</label>
                    <input type="text" name="maj2" value="{{ $student->maj2 }}" required>
                </div>

                <div>
                    <label>Maj3</label>
                    <input type="text" name="maj3" value="{{ $student->maj3 }}" >
                </div>

                <div>
                    <label>Total Score</label>
                    <input type="text" name="total_score" value="{{ $student->total_score }}" >
                </div>

                <div>
                    <label>Phone</label>
                    <input type="text" name="phone" value="{{ $student->phone }}" >
                </div>
                <div>
                    <label>School</label>
                    <input type="text" name="school" value="{{ $student->school }}" >
                </div>


                <button type="submit">Update</button>
            </form>
        </div>
    </main>
@endsection
