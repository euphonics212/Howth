$(document).ready(function(){
    //Fade In Hero Shot
    $(".hero-image").hide(0).fadeIn(3000);

    //add dynamic text to the aerial maps information section on clicking the relevent heading from the selection list, and fade the information in
    $("#text-bay").click(function(){
        $("#aerial-text-container").hide().fadeIn(1000);
        $("#aerial-text-container").html("<h3>Balscadden Bay</h3><p>Balscadden Bay is situated on the east coast of Ireland to the north of Dublin Bay on the far side of the Howth peninsula that juts out into the Irish Sea.</br></br>" + 
        "The bay lies on the southeast corner of Howth Harbour underneath the Martello tower at the beginning of the harbour's east pier. The anchorage is a good location if you have not been able to secure a berth in Howth Harbour or off its west pier.</br></br>" + 
        " Balscadden Bay is a good anchorage that affords protection to all conditions from the south round to west but is completely exposed to anything with an easterly component. Seaward access is straightforward but daylight navigation is required to locate the bay's fringing rocks. </p>"
        );
    });
    $("#text-harbour").click(function(){
        $("#aerial-text-container").hide().fadeIn(1000);
        $("#aerial-text-container").html("<h3>Howth Harbour</h3><p>A picturesque fishing village nestled on the rugged peninsula that forms the north side of Dublin Bay, Howth is one of Ireland’s many hidden treasures.</br></br>" + 
        " That is not to say that the village doesn’t receive its fair share of visitors. Far from it.</br></br> Howth is a favourite holiday destination and benefits especially from its popularity amongst yachtsmen and pleasure boaters.</br></br>" + 
        " Indeed Howth Yacht club dates back to 1895 and with around 2000 members it is by far the largest in the country and enjoys a busy programme of racing, regattas and voyaging.</br></br> " + 
        " The marina and club complex combine state of the art with old and traditional with standards of services superb across the board. As you would expect from such a large club, berths are plentiful and marine services top notch.</br></br>"+
        " Away from the harbour itself there is much to recommend Howth. Historians will love the ruined abbey, nearby Baily Lighthouse and 15th Century castle. You can take a bracing stroll along the piers, sightsee aboard an open top tram, watch seals and dolphins in the waters along the shore and take in breathtaking views from cliff top walks.</br></br>"+
        " Of course Howth’s working fishing port means that fish and seafood lovers are absolutely spoilt when it comes to dining out and the pub scene is second only to Dublin itself, if a little more relaxing.</p>"
        );
    });
    $("#text-Market").click(function(){
        $("#aerial-text-container").hide().fadeIn(1000);
        $("#aerial-text-container").html("<h3>Howth Market</h3> <p>Situated in the beautiful fishing town of Howth, Co. Dublin, Howth Market was established 9 years ago and has grown substantially over these years.</br></br>" + 
        " Following a major revamp in summer 2013, the market has become a permanent fixture standing proudly along the seafront of Howth. Welcoming both locals and tourists alike, Howth Market is a fantastic day out and offers a unique experience with a vast array of organic produce, freshly baked goods, jewelry, clothing, antiques and much much more...</br></br>" + 
        " The market itself takes place each weekend and also on Bank holidays while our front five units serve the public 7 days a week.</p>"
        );
    });
    $("#text-castle").click(function(){
        $("#aerial-text-container").hide().fadeIn(1000);
        $("#aerial-text-container").html("<h3>Howth Castle</h3><p>Turn the pages of history, step by step, exploring the upstairs and downstairs of Howth Castle, the intimate, private and warm hearth of history, legend and mythology.</br></br>" + 
        " The tours take place on Sundays at 14:00 from April to September and are approximately 70 minutes duration.The St Lawrence family came to Howth in 1177 and Howth Castle is one of the longest continuously inhabited private homes in Europe.</br></br>" + 
        " The Gate Tower and Keep date from the 15th century and it is a unique illustration of how historic houses have evolved in Ireland over the centuries.</p>"
        );
    });

    //clear the forms prompt message/element value when clicked
    var clearFormInst = 0;
    $("#name").click(function(){
        $("#name").val(" ");
    });
    $("#email").click(function(){
        $("#email").val(" ");
    });

    //use opacity change on map to indicate to user that a location is clickable
    $(".map-hover-coord").hover(function(){
        $(".aerial-bg").css("filter","opacity(0.9)");
    })
    $(".aerial-bg").hover(function(){
        $(".aerial-bg").css("filter","opacity(1)");
    })

  });

