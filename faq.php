<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- <title>Document</title> -->
    <title>NxGala</title>
    <link rel="shortcut icon" href="Images/favicon.png" type="image/x-icon">
    <link rel="stylesheet" type="text/css" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="Style/faq.css">
</head>
<body>
    <?php require_once 'Includes/Header.php'; ?>
    <div class="block">
        <h3 id="title" style="text-align:center">Frequently asked question</h3>
        
        <button type="button" class="question">Q1.question ask here?</button> 
        <div class="answer">
            <p>Here is the reason.!<p>
            <p>Okay this is the answer!!</p></div>
            <button type="button" class="question">Q1.question ask here?</button> 
            <div class="answer">
                <div class="reason">Here is the reason.!</div>
                <p>Okay this is the answer!!</p></div>
                <button type="button" class="question">Q1.question ask here?</button> 
        <div class="answer">
            <div class="reason">Here is the reason.!</div>
            <p>Okay this is the answer!!</p></div>
            <button type="button" class="question">Q1.question ask here?</button> 
        <div class="answer">
            <div class="reason">Here is the reason.!</div>
            <p>Okay this is the answer!!</p></div>
    </div>
        
<script>
    var coll = document.getElementsByClassName("question");
    var i;
    for(i = 0 ;i <coll.length;i++){
        coll[i].addEventListener("click",function(){
        this.classList.toggle("active");
        var content = this.nextElementSibling;
        if(content.style.maxHeight){
            content.style.maxHeight= null;
        }else {
            content.style.maxHeight = content.scrollHeight + "px";
        }
    });
}
</script>
<script src="Javascript/Header.js"></script>
</body>
</html>