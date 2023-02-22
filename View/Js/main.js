const taskModal = document.getElementById("taskModal");

function addTask(){
    document.getElementById("shadow").style.display = "block";
    document.getElementById("taskModal").style.display = "block";
}

function closeTask(){
    document.getElementById("shadow").style.display = "none";
    taskModal.style.display = "none";

}