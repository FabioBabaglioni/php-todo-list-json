<script >

// importo axios
import axios from "axios"

const apiUrl = "http://localhost:8888/"

export default {
    data() {
        return {
            toDoList: [],
            newTodoList: ""
        };
    },
    methods() {
        getAllData(){
            axios.get(apiUrl + "api.php")
                .then(res => {
                    const data = res.data

                    console.log(data);
                })
        }
    },
    mounted() {
        getAllData()
    }
}

</script>

<template>

    <main>

    </main>

</template>

<style scoped>

</style>
