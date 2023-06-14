@extends('layouts.main')
@section('container')
<style>
.wizard {
    max-width: 100%;
    margin: 0 auto;
}

.wizard-header {
    text-align: center;
}

.wizard-menu {
    list-style-type: none;
    padding: 0;
    margin: 0;
}

.wizard-menu li {
    display: inline-block;
    margin-right: 20px;
    cursor: pointer;
}

.wizard-menu li.active {
    font-weight: bold;
}

.wizard-content {
    background-color: #f5f5f5;
    padding: 60px;
}

.step {
    display: none;
}

.step.active {
    display: block;
}

.wizard-buttons {
    margin-top: 20px;
    text-align: right;
}

.wizard-buttons button {
    margin-left: 10px;
}

.prev-button {
    display: none;
}
</style>

<h1 class="mb-4">Form Registrasi Penonton</h1>
<form method="post" id="kirim" action="{{ url('/penonton') }}">
    @csrf
    <div class="wizard">
        <div class="wizard-header">
            <ul class="wizard-menu">
                <li class="active">User Account</li>
                <li>Personal Identity</li>
                <li>Finish</li>
            </ul>
        </div>
        <div class="wizard-content">
            <div class="step active">
                <h2>Step 1: User Account</h2>
                <hr>
                <table class="table" style="width: 60%;">
                    <tr>
                        <td>Username</td>
                        <td>:</td>
                        <td>
                            @error('username')
                            <div class="invalid-feedback"> {{ $message }} </div>
                            @enderror
                            <input type="text" name="username" placeholder="Input your Username"
                                value="{{ old('username') }}"
                                class="form-control @error('username') is-invalid @enderror" required>
                        </td>
                    </tr>

                    <tr>
                        <td>Password</td>
                        <td>:</td>
                        <td>
                            @error('password')
                            <div class="invalid-feedback"> {{ $message }} </div>
                            @enderror
                            <input type="password" name="password" placeholder="Input your password"
                                class="form-control @error('name') is-invalid @enderror" required>
                        </td>
                    </tr>
                </table>
            </div>
            <div class="step">
                <h2>Step 2: Personal Identity</h2>
                <hr>
                <table class="table" style="width: 60%;">
                    <tr>
                        <td>Fullname</td>
                        <td>:</td>
                        <td>
                            @error('name')
                            <div class="invalid-feedback"> {{ $message }} </div>
                            @enderror
                            <input type="text" name="name" placeholder="Input your name" value="{{ old('name') }}"
                                class="form-control @error('name') is-invalid @enderror" required>
                        </td>
                    </tr>
                    <tr>
                        <td>Gender</td>
                        <td>:</td>
                        <td>
                            @error('gender')
                            <div class="invalid-feedback"> {{ $message }} </div>
                            @enderror
                            <input type="radio" name="gender" value="Male">Male
                            <input type="radio" name="gender" value="Female">Female
                        </td>
                    </tr>
                    <tr>
                        <td>Address</td>
                        <td>:</td>
                        <td>
                            @error('address')
                            <div class="invalid-feedback"> {{ $message }} </div>
                            @enderror
                            <input type="text" name="address" placeholder="Input your address"
                                value="{{ old('address') }}" class="form-control @error('address') is-invalid @enderror"
                                required>
                        </td>
                    </tr>
                    <tr>
                        <td>Phone</td>
                        <td>:</td>
                        <td>
                            @error('phone')
                            <div class="invalid-feedback"> {{ $message }} </div>
                            @enderror
                            <label><input type="text" name="phone" placeholder="Input your phone"
                                    value="{{ old('phone') }}" class="form-control @error('phone') is-invalid @enderror"
                                    required>
                        </td>
                    </tr>
                    <tr>
                        <td>Email</td>
                        <td>:</td>
                        <td>
                            @error('email')
                            <div class="invalid-feedback"> {{ $message }} </div>
                            @enderror
                            <input type="text" name="email" placeholder="Input your email" value="{{ old('email') }}"
                                class="form-control @error('email') is-invalid @enderror" required>
                        </td>
                    </tr>
                </table>
            </div>
            <div class="step">
                <h2>Step 3: Finish</h2>
                <hr>
                <p>Thank you for completing the form.</p>
            </div>
            <div class="wizard-buttons">
                <button class="prev-button btn btn-success" type="button">Previous</button>
                <button class="next-button btn btn-success" type="button">Next</button>
                <button class="submit-button btn btn-primary" type="submit">Submit</button>
            </div>
        </div>
    </div>
</form>
<script>
document.addEventListener('DOMContentLoaded', function() {
    const steps = document.querySelectorAll('.step');
    const prevButton = document.querySelector('.prev-button');
    const nextButton = document.querySelector('.next-button');
    const submitButton = document.querySelector('.submit-button');
    let currentStep = 0;

    // Fungsi untuk menampilkan langkah saat ini
    function showStep(stepIndex) {
        steps.forEach(function(step) {
            step.style.display = 'none';
        });
        steps[stepIndex].style.display = 'block';
    }

    // Fungsi untuk menampilkan tombol navigasi yang sesuai dengan langkah saat ini
    function updateButtons() {
        if (currentStep === 0) {
            prevButton.style.display = 'none';
        } else {
            prevButton.style.display = 'inline-block';
        }

        if (currentStep === steps.length - 1) {
            nextButton.style.display = 'none';
            submitButton.style.display = 'inline-block';
        } else {
            nextButton.style.display = 'inline-block';
            submitButton.style.display = 'none';
        }
    }

    // Fungsi untuk navigasi ke langkah sebelumnya
    function goToPrevStep() {
        if (currentStep > 0) {
            currentStep--;
            showStep(currentStep);
            updateButtons();
        }
    }

    // Fungsi untuk navigasi ke langkah berikutnya
    function goToNextStep() {
        if (currentStep < steps.length - 1) {
            currentStep++;
            showStep(currentStep);
            updateButtons();
        }
    }

    // Event listener untuk tombol "Previous" dan "Next"
    prevButton.addEventListener('click', goToPrevStep);
    nextButton.addEventListener('click', goToNextStep);

    // Event listener untuk tombol "Submit"
    submitButton.addEventListener('click', function(event) {
        event.preventDefault();
        // Lakukan tindakan yang sesuai saat form disubmit
        // ...
    });

    // Tampilkan langkah pertama saat halaman dimuat
    showStep(currentStep);
    updateButtons();
});
</script>
@endsection