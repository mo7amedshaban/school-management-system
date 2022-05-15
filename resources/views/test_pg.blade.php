<div class="page">
    <div>1</div>
    <div>2</div>
    <div>3</div>
    <div>4</div>
    <div>5</div>
    <div>6</div>
    <div>1</div>
    <div class="test">2</div>
    <div>3</div>
    <div>4</div>
    <div>5</div>
    <div>6</div>
    <div>1</div>
    <div>2</div>
    <div>3</div>
    <div>4</div>
    <div class="test2">5</div>
    <div>6</div>
    <div>1</div>
    <div>2</div>
    <div>3</div>
    <div>4</div>
    <div>5</div>
    <div>6</div>
</div>
<style>
    *{ margin:0;padding:0;box-sizing:border-box;}
    .page{
        margin:100px auto;
        background:black;
        padding:10px;
        width:50vw; display:grid;
        grid-template-columns: repeat(auto-fill,minmax(100px,1fr));
        gap:10px 10px;
    }
    div{
        margin:10px;
        padding:20px;
        background:red;
    }
   .test{
        grid-area: 2 / 2 / span 1 / span 3;
        background-color:burlywood;}

</style>

