<template>
    <div class="container">
        <div class="osahan-signup login-page">
        <video loop autoplay muted id="vid">
            <source src="img/bg.mp4" type="video/mp4">
            <source src="img/bg.mp4" type="video/ogg">
            Your browser does not support the video tag.
         </video>
        <div class="d-flex align-items-center justify-content-center flex-column vh-100">
            <div class="px-5 col-md-6 ml-auto">
                <div class="px-5 col-10 mx-auto mb-4">
                    <h2 class="mb-3">Verify your phone number </h2>
                    <h6 class="text-black-50">Enter your OTP code here</h6>
                    <form action="home.html">
                        <div class="row my-5 mx-0 otp">
                            <div class="col pr-1 pl-0">
                                <input type="text" value="4" class="form-control form-control-lg">
                            </div>
                            <div class="col px-2">
                                <input type="text" value="0" class="form-control form-control-lg">
                            </div>
                            <div class="col px-2">
                                <input type="text" value="8" class="form-control form-control-lg">
                            </div>
                            <div class="col pl-1 pr-0">
                                <input type="text" value="0" class="form-control form-control-lg">
                            </div>
                        </div>
                        <button class="btn btn-lg btn-primary btn-block">Verify Now</button>
                    </form>
                </div>
                <div class="new-acc d-flex align-items-center justify-content-center">
                    <a href="login.html">
                        <p class="text-center m-0">Already an account? Sign in</p>
                    </a>
                </div>
            </div>
        </div>
    </div>
    </div>
</template>

<script>
    export default {
        mounted() {
            console.log('Component mounted.')
        }
    }
</script>
