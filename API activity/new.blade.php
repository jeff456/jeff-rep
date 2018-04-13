<!DOCTYPE html>
<html>
  <head>


<script
  src="https://code.jquery.com/jquery-2.2.4.min.js"
  integrity="sha256-BbhdlvQf/xTY9gja0Dq3HiwQF8LaCRTXxZKRutelT44="
  crossorigin="anonymous">    
  </script>

<script type="text/javascript">

$(function (){

    var $work = $('#work');
    $.ajax ({
        type: 'GET',
        url:"http://matrix.f45.info/v1/workouts",
            success: function (work){
                console.log(work);
                for (var key in work.data) {
                    console.log( work.data[key].id  + work.data[key].id + work.data[key].program_id + work.data[key].rounds + work.data[key].sets + work.data[key].timeline + work.data[key].week + work.data[key].weekday + work.data[key].work + work.data[key].workout_information_video_mp4
                        + work.data[key].workout_information_video_thumbnail
                        );


                    
    $('tbody').append('<tr></tr>'); 
    $('tbody').append( '<td>' +  work.data[key].id + '</td> <td>' +  work.data[key].workout_name + '</td> <td>' +  work.data[key].program_id + '</td> <td>' + work.data[key].rounds + '</td> <td>' + work.data[key].sets + '</td><td>' +  work.data[key].timeline + '</td> <td>' +  work.data[key].week + '</td><td>' +  work.data[key].weekday + '</td> <td>' +  work.data[key].work + '</td> <td>'  + '<video width = "200" controls>' + '<source src=' + work.data[key].workout_information_video_mp4 + ' type="video/mp4">' + '</video>' + '<td>' +"<img src =" + work.data[key].workout_information_video_thumbnail + ' width="150" />'
    + '</td>'); 

                }
            }
        });
    
});
</script>



  </head>
<br></br>
 <body>

    <div class="container">
    <table class="table table-bordered" align = center width='90%'  border = 0 >
        <center><h1>Customer Details</h1></center>
      <tbody>
            <tr bgcolor='lightblue'>
               <td>ID</td>
                <td>Name</td>
                <td>Program ID</td>
                <td>Rounds</td>
                <td>Sets</td>
                <td>Timeline</td>
                <td>Week</td>
                <td>Weekday</td>   
                <td>Work</td>      
                <td>Video(mp4)</td>         
             </tr>
      </tbody>
    </table>
</div>
  </body>
</html>