<template>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Laravel Vue JS File Upload Example - ItSolutionStuff.com</div>
    
                    <div class="card-body">
                        <div v-if="success != ''" class="alert alert-success" role="alert">
                          {{success}}
                        </div>
                        <form @submit="formSubmit" enctype="multipart/form-data">
                        <strong>Name:</strong>
                        <input type="text" class="form-control" v-model="name">
                        <strong>File:</strong>
                        <input type="file" class="form-control" v-on:change="onFileChange" multiple="multiple">
    
                        <button class="btn btn-success">Submit</button>
                        </form>
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
        },
        data() {
            return {
              name: '',
              file: [],
              success: ''
            };
        },
        methods: {
            onFileChange(e){
                for (let i = 0; i < e.target.files.length; i++) {
                    this.file.push(e.target.files[i])
                }
            },
            formSubmit(e) {
                e.preventDefault();
                let currentObj = this;
   
                const config = {
                    headers: { 'content-type': 'multipart/form-data' }
                }

                console.log(this.file)
    
                var formData = new FormData();
                for (let i = 0; i < this.file.length; i++) {
                    formData.append('file[]', this.file[i]);
                }
   
                axios.post('/formSubmit', formData, config)
                .then(function (response) {
                    currentObj.success = response.data.success;
                })
                .catch(function (error) {
                    currentObj.output = error;
                });
            }
        }
    }
</script>