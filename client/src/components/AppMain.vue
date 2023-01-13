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

        // metodo per creare un nuova task 
        createNewTask(e) {
            e.preventDefault();

            // creo i parametri per passare i dati al backend
            const config = {
                params: {
                    "text": this.newTask
                }

            }

            // faccio la chiamata al url e gli mando i dati e lui mi restituisce il file json aggiornato
            axios.get(apiUrl + "/CreateTask.php", config)
                .then(() => {
                    this.newTask = "";
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

    <main class="container_site">
        <div class="list">
            <h1>Todo List</h1>
            <div class="task" v-for="(element, index) in toDoList" :key="index">
                <span>{{ element.text }}</span>
            </div>

            <form @submit="createNewTask">
                <input type="text" name="newtask" v-model="newTask">
                <input type="submit" value="new task" class="button">
            </form>
        </div>



    </main>

</template>

<style scoped lang="scss">
li {
    list-style-type: none;
}

.container_site {
    height: 100vh;
    background-color: lightblue
}

.list {
    width: 60%;
    margin: 0 auto;
    background-color: blue;
    text-align: center;
}

.task {
    width: 20%;
    margin: 20px auto;
    padding: 10px;
    border-radius: 20px;
    background-color: antiquewhite;

    &:hover {
        background-color: aquamarine;
    }
}

form {
    padding: 30px;

    input {
        border-radius: 30px;
        margin-right: 10px;
        border: none;
    }

    .button {
        background-color: red;
        border: none;
        color: white;
        padding: 5px 20px;

        &:hover {
            background-color: green;
        }
    }
}

h1 {
    padding: 10px;
    font-weight: 100;
    font-size: 80px;
}
</style>
