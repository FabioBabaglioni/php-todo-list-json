<script>

// importo axios
import axios from "axios"

// inserisco la constante per la mia url
const apiUrl = "http://localhost:8888/php-todo-list-json/Back_end"

export default {
    data() {
        return {
            // definisco un array che si andrà a popolare con i dati del back end
            toDoList: [],
            newTask: ""
        };
    },
    methods: {

        getAllData() {
            axios.get(apiUrl + "/api.php")
                .then(res => {
                    const data = res.data

                    // inserisco i dati del file json nella todolist
                    this.toDoList = data;
                })
        },
        createNewTask(e) {
            e.preventDefault();

            const newTaskText = this.newTask

            const params = {
                params: {
                    "newtask": newTaskText
                }
            }

            axios.get(apiUrl + "/CreateTask.php", params)
                .then(() => {

                    this.newTodoText = "";
                    this.getAllData();
                });
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
            <!-- stampo in pagina i primi task richiamandoli dalla todolist -->
            <li v-for="(element, index) in toDoList" :key="index">
                {{ element.text }}
            </li>
        </ul>

        <form @submit="createNewTask">
            <input type="text" name="newtask" v-model="newTask">
            <input type="submit" value="newtask">
        </form>


    </main>

</template>

<style scoped>

</style>
