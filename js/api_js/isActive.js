const handleSetStatus = async ()=>{
    const formData = new FormData();
    formData.append("userID", USER_ID)
    formData.append("status", 1)
    const req = await fetch("./api/is_active.php", {
        method: "POST",
        body: formData
    })

    const response = await req.json()
    console.table({request: response})
}


window.addEventListener("load", handleSetStatus)