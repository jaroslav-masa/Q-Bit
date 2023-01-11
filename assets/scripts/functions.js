function closeThis(e){
    console.log("removing Announcement!");
    e.parentNode.parentNode.parentNode.removeChild(e.parentNode.parentNode);
}