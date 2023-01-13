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
    methods: {

        getAllData() {
            axios.get(apiUrl + "php-todo-list-json/Back_end/api.php")
                .then(res => {
                    const data = res.data

                    this.toDoList = data;
                })
        }
    },
    mounted() {
        this.getAllData()
    }
}

</script>

<template>

    <main>
        <ul>
            <li v-for="(element, index) in toDoList" :key="index">
                {{ element.text }}
            </li>
        </ul>
    </main>

</template>

<style scoped>

</style>
