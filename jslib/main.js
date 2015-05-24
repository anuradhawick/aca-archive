// Coded by W.A. Anuradha Wickramarachchi

jQuery(document).ready(function($) {

    // semester operations
    var perpage = 5;
    var semPage = 0;
    var semResultCount = 0;
    $.get('req.php?id=main&pg='+semPage+'&count='+perpage, function(data) {
        var arr = JSON.parse(data);
        semResultCount = arr[0].total;
        $("#make").hide();
        for (var i = 0; i < arr.length ;i++) {
            $("#make").append("<a href='javascript:void(0)' class='semester' id="+arr[i].semID+"><h1>"+arr[i].name+"<h1></a>");
            $("#make").append("<blockquote class='text-justify'>"+arr[i].description+"</blockquote>");
        };
        if(semResultCount > perpage){
            $("#make").append("<a href='javascript:void(0)' class='btn btn-info' id='nextSem'>Next</a>");
        }
        $("#make").slideDown(400);
    });

    $(document).on('click', '#nextSem', function(event) {
        $.get('req.php?id=main&pg='+(++semPage)+'&count='+(perpage), function(data) {
            var arr = JSON.parse(data);
            $("#make").empty();
            $("#make").append("<a href='javascript:void(0)' class='btn btn-info' id='prevSem'>Back </a>");
            for (var i = 0; i < arr.length ;i++) {
                $("#make").append("<a href='javascript:void(0)' class='semester' id="+arr[i].semID+"><h1>"+arr[i].name+"<h1></a>");
                $("#make").append("<blockquote class='text-justify'>"+arr[i].description+"</blockquote>");
            };
            if((semPage+1)*perpage < semResultCount){
                $("#make").append("<a href='javascript:void(0)' class='btn btn-info' id='nextSem'>Next</a>");
            }
            
        });
        
    });

    $(document).on('click', '#prevSem', function(event) {
        $.get('req.php?id=main&pg='+(--semPage)+'&count='+(perpage), function(data) {
            var arr = JSON.parse(data);
            $("#make").empty();
            if(semPage>0){
                $("#make").append("<a href='javascript:void(0)' class='btn btn-info' id='prevSem'>Back</a>");
            }
            for (var i = 0; i < arr.length ;i++) {
                $("#make").append("<a href='javascript:void(0)' class='semester' id="+arr[i].semID+"><h1>"+arr[i].name+"<h1></a>");
                $("#make").append("<blockquote class='text-justify'>"+arr[i].description+"</blockquote>");
            };
            if((semPage+1)*perpage < semResultCount){
                $("#make").append("<a href='javascript:void(0)' class='btn btn-info' id='nextSem'>Next</a>");
            }
        });
        
    });

    var subPage = 0;
    var subPageCount = 0;
    var semID = 0;
    $(document).on('click', '.semester', function(event) {
        semID = this.id;
        $("#make").empty(); 
        $("#make").append("<a href='javascript:void(0)' class='btn btn-info' id='backtosem'>Semester navigation </a>");
        $.get('req.php?id=sub&pg='+subPage+'&count='+perpage+'&semID='+semID, function(data) {
            var arr = JSON.parse(data);
            subPageCount = arr[0].total;
            for (var i = 0; i < arr.length ;i++) {
                $("#make").append("<a href='javascript:void(0)' class='subject' id="+arr[i].subID+"><h1>"+arr[i].subname+"<h1></a>");
                $("#make").append("<blockquote class='text-justify'>"+arr[i].description+"</blockquote>");
            };
            if(subPageCount > perpage){
                $("#make").append("<a href='javascript:void(0)' class='btn btn-info' id='nextSub'>Next</a>");
            }
        });
    });

    // End of semester operations

    //subject operations
    $(document).on('click', '#backtosem', function(event) {
        $.get('req.php?id=main&pg='+(semPage)+'&count='+(perpage), function(data) {
            var arr = JSON.parse(data);
            $("#make").empty();
            if(semPage>0){
                $("#make").append("<a href='javascript:void(0)' class='btn btn-info' id='prevSem'>Back</a>");
            }
            for (var i = 0; i < arr.length ;i++) {
                $("#make").append("<a href='javascript:void(0)' class='semester' id="+arr[i].semID+"><h1>"+arr[i].name+"<h1></a>");
                $("#make").append("<blockquote class='text-justify'>"+arr[i].description+"</blockquote>");
            };
            if((semPage+1)*perpage < semResultCount){
                $("#make").append("<a href='javascript:void(0)' class='btn btn-info' id='nextSem'>Next</a>");
            }
        });
        
    });

    $(document).on('click', '#nextSub', function(event) {
        $.get('req.php?id=sub&pg='+(++subPage)+'&count='+(perpage)+'&semID='+semID, function(data) {
            var arr = JSON.parse(data);
            $("#make").empty();
            if(subPage>0){
                $("#make").append("<a href='javascript:void(0)' class='btn btn-info' id='prevSub'>Back</a>");
            }
            $("#make").append("<a href='javascript:void(0)' class='btn btn-info' id='backtosem'>Semester navigation</a>");
            for (var i = 0; i < arr.length ;i++) {
                $("#make").append("<a href='javascript:void(0)' class='subject' id="+arr[i].subID+"><h1>"+arr[i].subname+"<h1></a>");
                $("#make").append("<blockquote class='text-justify'>"+arr[i].description+"</blockquote>");
            };
            if((subPage+1)*perpage < subPageCount){
                $("#make").append("<a href='javascript:void(0)' class='btn btn-info' id='nextSub'>Next</a>");
            }
        });
    });
   
    $(document).on('click', '#prevSub', function(event) {
        $.get('req.php?id=sub&pg='+(--subPage)+'&count='+(perpage)+'&semID='+semID, function(data) {
            var arr = JSON.parse(data);
            $("#make").empty();
            if(subPage>0){
                $("#make").append("<a href='javascript:void(0)' class='btn btn-info' id='prevSub'>Back</a>");
            }
            $("#make").append("<a href='javascript:void(0)' class='btn btn-info' id='backtosem'>Semester navigation</a>");
            for (var i = 0; i < arr.length ;i++) {
                $("#make").append("<a href='javascript:void(0)' class='subject' id="+arr[i].subID+"><h1>"+arr[i].subname+"<h1></a>");
                $("#make").append("<blockquote class='text-justify'>"+arr[i].description+"</blockquote>");
            };
            if((subPage+1)*perpage < subPageCount){
                $("#make").append("<a href='javascript:void(0)' class='btn btn-info' id='nextSub'>Next</a>");
            }
        });
    });
    
    //displaying the subject material
    var subID;
    $(document).on('click', '.subject', function(event) {
        subID = this.id;
        $("#make").empty(); 
        $.get('req.php?id=res&pg='+subPage+'&count='+perpage+'&subID='+subID, function(data) {
            var arr = JSON.parse(data);
            $("#make").append("<a href='javascript:void(0)' class='btn btn-info' id='backToSub'>Back</a>");
            $("#make").append("<a href='javascript:void(0)' class='btn btn-info' id='backtosem'>Semester navigation</a>");
            for (var i = 0; i < arr.length ;i++) {
                $("#make").append("<a href="+arr[i].link+" target='_blank'><h1>"+arr[i].topic+"<h1></a>");
                $("#make").append("<blockquote class='text-justify'>"+arr[i].description+"</blockquote>");
            }; 
        });
    });
    
    $(document).on('click', '#backToSub', function(event) {
        $.get('req.php?id=sub&pg='+(subPage)+'&count='+(perpage)+'&semID='+semID, function(data) {
            var arr = JSON.parse(data);
            $("#make").empty();
            if(subPage>0){
                $("#make").append("<a href='javascript:void(0)' class='btn btn-info' id='prevSub'>Back</a>");
            }
            $("#make").append("<a href='javascript:void(0)' class='btn btn-info' id='backtosem'>Semester navigation</a>");
            for (var i = 0; i < arr.length ;i++) {
                $("#make").append("<a href='javascript:void(0)' class='subject' id="+arr[i].subID+"><h1>"+arr[i].subname+"<h1></a>");
                $("#make").append("<blockquote class='text-justify'>"+arr[i].description+"</blockquote>");
            };
            if((subPage+1)*perpage < subPageCount){
                $("#make").append("<a href='javascript:void(0)' class='btn btn-info' id='nextSub'>Next</a>");
            }
        });
    });
});
