<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/vue@2/dist/vue.js"></script>
    <script src="./jnet.js"></script>
</head>

<body>

    <nav class="navbar navbar-expand-lg bg-body-tertiary">
        <div class="container-fluid">
            <a class="navbar-brand" href=".">Home</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false"
                aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="#">Profile</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">About</a>
                    </li>

                </ul>
                <form class="d-flex" role="search">
                    <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
                    <button class="btn btn-outline-success" type="submit">Search</button>
                </form>
            </div>
        </div>
    </nav>
    <br><br>
    <div class="container" id="app">
        <hr>
        <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#modal_add">+Add</button>
        <hr>
        <table class="table">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Username</th>
                    <th scope="col">Email</th>
                    <th scope="col">Password</th>
                    <th scope="col">Phone</th>
                    <th scope="col">@</th>
                </tr>
            </thead>
            <tbody>
                <tr v-for="(data,i) in data_users">
                    <th scope="row">{{i=i+1}}</th>
                    <td>
                        <a :href="viewLink(data.id_user)">{{ data.username }}</a>
                    </td>
                    <td>{{data.email}}</td>
                    <td>{{data.password}}</td>
                    <td>{{data.phone}}</td>
                    <td>
                        <button class="btn btn-warning" data-bs-toggle="modal" data-bs-target="#modal_update" @click="showUpdated(data)">Update</button>
                        <button class="btn btn-danger" @click="deleteData(data.id_user)">x</button>
                    </td>
                </tr>

            </tbody>
        </table>
    </div>

    <!-- Modal add-->
    <div class="modal fade" id="modal_add" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="exampleModalLabel">Modal title</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="input-group mb-3">
                        <span class="input-group-text" id="basic-addon1">Username</span>
                        <input type="text" class="form-control" @keypress="enterAdd($event)" ref="username" v-model="username"
                            placeholder="Username" aria-label="Username" aria-describedby="basic-addon1">
                    </div>
                    <div class="input-group mb-3">
                        <span class="input-group-text" id="basic-addon1">Email</span>
                        <input type="text" class="form-control" @keypress="enterAdd($event)" ref="email" v-model="email"
                            placeholder="Email" aria-label="Username" aria-describedby="basic-addon1">
                    </div>
                    <div class="input-group mb-3">
                        <span class="input-group-text" id="basic-addon1">Password</span>
                        <input type="text" class="form-control" @keypress="enterAdd($event)" ref="password" v-model="password"
                            placeholder="Password" aria-label="Username" aria-describedby="basic-addon1">
                    </div>
                    <div class="input-group mb-3">
                        <span class="input-group-text" id="basic-addon1">Phone</span>
                        <input type="text" class="form-control" @keypress="enterAdd($event)" ref="phone" v-model="phone"
                            placeholder="Phone" aria-label="Username" aria-describedby="basic-addon1">
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="button" @click="save" class="btn btn-primary">Save</button>
                </div>
            </div>
        </div>
    </div>


       <!-- Modal update-->
       <div class="modal fade" id="modal_update" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="exampleModalLabel">Modal title</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="input-group mb-3">
                        <span class="input-group-text" id="basic-addon1">Username</span>
                        <input type="text" class="form-control" @keypress="enterAdd($event)" ref="username" v-model="username"
                            placeholder="Username" aria-label="Username" aria-describedby="basic-addon1">
                    </div>
                    <div class="input-group mb-3">
                        <span class="input-group-text" id="basic-addon1">Email</span>
                        <input type="text" class="form-control" @keypress="enterAdd($event)" ref="email" v-model="email"
                            placeholder="Email" aria-label="Username" aria-describedby="basic-addon1">
                    </div>
                    <div class="input-group mb-3">
                        <span class="input-group-text" id="basic-addon1">Password</span>
                        <input type="text" class="form-control" @keypress="enterAdd($event)" ref="password" v-model="password"
                            placeholder="Password" aria-label="Username" aria-describedby="basic-addon1">
                    </div>
                    <div class="input-group mb-3">
                        <span class="input-group-text" id="basic-addon1">Phone</span>
                        <input type="text" class="form-control" @keypress="enterAdd($event)" ref="phone" v-model="phone"
                            placeholder="Phone" aria-label="Username" aria-describedby="basic-addon1">
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="button" @click="save" class="btn btn-primary">Save</button>
                </div>
            </div>
        </div>
    </div>


    <script>
        var App = new Vue({
            el: '#app',
            data: {
                data_users: null
            },
            methods: {
                showUpdated: function(data){
                    update.username = data.username;
                    update.email = data.email;
                    update.phone = data.phone;
                    update.password = data.password;
                    update.id_user = data.id_user;
                },
                viewLink: function(id_user){
                    return 'user/'+id_user;
                },
                loadData: function() {
                    const $this = this;
                    jnet({
                        url: './users',
                        method: 'post',
                        data: {
                            _token: "<?= csrf_token() ?>"
                        }
                    }).request($response => {
                        let $obj = JSON.parse($response);
                        $this.data_users = $obj;
                    })
                },
                deleteData: function(id_user) {
                    const $this = this;
                    jnet({
                        url: './users-delete',
                        method: 'post',
                        data: {
                            _token: "<?= csrf_token() ?>",
                            id_user: id_user
                        }
                    }).request($response => {
                        let $obj = JSON.parse($response);
                        if ($obj) {
                            alert("Success deleted!")
                            $this.loadData();
                        }
                    })
                }
            },
            mounted() {
                this.loadData();
            }
        });

        new Vue({
            el: '#modal_add',
            data: {
                username:null,
                email:null,
                password:null,
                phone:null
            },
            methods:{
                enterAdd: function(e){
                    if (e.keyCode==13){
                        this.save()
                    }
                },
                save: function(){
                    if (this.username == null) {
                        this.$refs.username.focus()
                        return;
                    }
                    if (this.email == null) {
                        this.$refs.email.focus()
                        return;
                    }
                    if (this.password == null) {
                        this.$refs.password.focus()
                        return;
                    }
                    if (this.phone == null) {
                        this.$refs.phone.focus()
                        return;
                    }
                    const $this = this;
                    jnet({
                        url: './add-user',
                        method: 'post',
                        data: {
                            _token: "<?= csrf_token() ?>",
                            username : this.username,
                            email : this.email,
                            phone:this.phone,
                            password: this.password
                        }
                    }).request($response => {
                        let $obj = JSON.parse($response);
                        if ($obj) {
                            alert("Success add!")
                            App.loadData();
                        }
                    })

                }
            }
        })

      var update =   new Vue({
            el: '#modal_update',
            data: {
                username:null,
                email:null,
                password:null,
                phone:null,
                id_user :null
            },
            methods:{
                enterAdd: function(e){
                    if (e.keyCode==13){
                        this.save()
                    }
                },
                save: function(){
                    if (this.username == null) {
                        this.$refs.username.focus()
                        return;
                    }
                    if (this.email == null) {
                        this.$refs.email.focus()
                        return;
                    }
                    if (this.password == null) {
                        this.$refs.password.focus()
                        return;
                    }
                    if (this.phone == null) {
                        this.$refs.phone.focus()
                        return;
                    }
                    const $this = this;
                    jnet({
                        url: './update-user',
                        method: 'post',
                        data: {
                            _token: "<?= csrf_token() ?>",
                            username : this.username,
                            email : this.email,
                            phone:this.phone,
                            password: this.password,
                            id_user : this.id_user
                        }
                    }).request($response => {
                        let $obj = JSON.parse($response);
                        if ($obj) {
                            alert("Success updated!")
                            App.loadData();
                        }
                    })

                }
            }
        })
    </script>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-HwwvtgBNo3bZJJLYd8oVXjrBZt8cqVSpeBNS5n7C8IVInixGAoxmnlMuBnhbgrkm" crossorigin="anonymous">
    </script>

</body>

</html>