
function deleteTask(id) {
    this.id = id.replace( /\D+/g, '');
    url = '/delete/' + this.id;
    if (confirm('Are you sure you want delete this task?')) {
        axios.delete(url, {
            params: {id: this.id}
        })
            .then(function (response) {
                document.getElementById(this.id+"_area").style.display = "none";

            })
            .catch(function (error) {
                console.log(error);

            });
    }
}
function markTask(id) {
    this.id = id.replace( /\D+/g, '');
    url = '/mark/'+this.id;
    axios.patch(url,{
        params: {mark: true}
    }).then(function (response) {
        document.getElementById(this.id+"_area").className = "alert alert-danger";
        document.getElementById(this.id+"_mark").style.display="none";
        document.getElementById(this.id+"_delete").style.display="block";
        console.log(response);
    })
        .catch(function (error) {
            console.log(error);

        });
}