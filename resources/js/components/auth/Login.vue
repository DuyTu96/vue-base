<template>
    <div class="container">
        <div class="form-signin">
            <h2 class="form-signin-heading">sign in now</h2>
            <div class="login-wrap">
                <p :style="{'color': 'red', 'font-size': '14px'}" v-if="errorWhenLogin == true">Login Fail!</p>
                <input type="email" class="form-control" placeholder="User Mail" autofocus v-model="email" :style="{'margin-bottom': '15px'}">
                <input type="password" class="form-control" placeholder="Password" v-model="password">
                <label class="checkbox">
                    <input type="checkbox" value="remember-me"> Remember me
                    <span class="pull-right">
                    <a data-toggle="modal" href="#myModal"> Forgot Password?</a>
                </span>
                </label>
                <button class="btn btn-lg btn-login btn-block" @click="login">Sign in</button>
                <p>or you can sign in via social network</p>
                <div class="login-social-link">
                    <a href="index.html" class="facebook">
                        <i class="fa fa-facebook"></i> Facebook
                    </a>
                    <a href="index.html" class="twitter">
                        <i class="fa fa-twitter"></i> Twitter
                    </a>
                </div>
                <div class="registration">
                    Don't have an account yet?
                    <router-link tag="a" to="/registion">Create an account</router-link>
                </div>

            </div>
            <div aria-hidden="true" aria-labelledby="myModalLabel" role="dialog" tabindex="-1" id="myModal" class="modal fade">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                            <h4 class="modal-title">Forgot Password ?</h4>
                        </div>
                        <div class="modal-body">
                            <p>Enter your e-mail address below to reset your password.</p>
                            <input type="text" name="email" placeholder="Email" autocomplete="off" class="form-control placeholder-no-fix">

                        </div>
                        <div class="modal-footer">
                            <button data-dismiss="modal" class="btn btn-default" type="button">Cancel</button>
                            <button class="btn btn-success" type="button">Submit</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
export default {
    data: function() {
      return {
        email: "",
        password: "",
        errorWhenLogin: false,
      }
    },
    methods: {
        login () {
            axios.post('/api/login', {
                email: this.email, 
                password: this.password,
            },{
            'X-CSRF-TOKEN': document.querySelector('head meta[name="csrf-token"]')
            }).then(response => {
                if (response.data == 1) {
                    this.$router.push("/dashboard");
                } else {
                    this.errorWhenLogin = true
                }
            })
            .catch(error => {
                
            })
        }
    }
}
</script>

<style>

</style>