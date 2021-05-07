
 const plugin = (function(){
    const content = $('#table tbody');
    const depart_input = $("#department");
    const course_input = $("#course");
    const study_level = $("#study_level");
    const subject = $("#subject");


    const init = () =>{
        //getItems()
        bindFuctions()

    }
    const getItems = () => {
         	$.ajax({
    		url:"/timeTable/items",
    		data: {course: $("#course").val(), study_level: $("#study_level").val(), lecturer: $("#lecturer").val(), venue: $("#venue").val(), subject: $("#subject").val()},
    		success:function(data){
    			const usedVenues = data.usedVenues.map(venue => parseInt(venue.time_id));
    			const allocatedSubjects = data.allocatedSubjects.map(subject => parseInt(subject.time_id));
    			const allocatedLecturers = data.allocatedLecturers.map(lecturer => parseInt(lecturer.time_id));


    			const availableVenues = data.items.map(item => usedVenues.includes(item.id) ? {...item,isVenueAvailable:false}: {...item,isVenueAvailable:true})
    			const availableLecturers= availableVenues.map(item => allocatedLecturers.includes(item.id) ? {...item,isLecturersAllocated:false}: {...item,isLecturersAvailable:true})
    			const items = availableLecturers.map(item => allocatedSubjects.includes(item.id) ? {...item,isSubjectAllocated:false}: {...item,isSubjectAllocated:true})
    			console.log(allocatedLecturers)
    			console.log(allocatedSubjects)
    			const days = {
    				mon: items.filter(item => item.days === "Monday"),
    				tue:items.filter(item => item.days === "Tuesday"),
    				wed: items.filter(item => item.days === "Wednesday"),
    				thur:items.filter(item => item.days === "Thursday"),
    				fri:items.filter(item => item.days === "Friday")
    			}
    			console.log(days)
                $('#table tbody').empty()
                $('#venue_name').empty()
                $('#venue_name').append(`You Are Currently On: <span>${data.venue_name[0].name}</span>`)
               $('#table tbody').append(template(days));
    		},
    		beforeSend: function(){
    			$('#table tbody').empty()
    			$('#table tbody').append(`<p style="text-align:center"><i class="fa fa-spinner fa-spin" style="font-size:24px; "></i></p>`);
    		},
    		error:function(data){
    			console.log(data)
    		}
    	})
    }
    const verdict = (data) => {
       var msg = "";
    	if(!data.isVenueAvailable){
    	    msg += "Venue is not available <br/>"
        }
        if(!data.isLecturersAvailable){
    	    msg += "Lecturer is not available <br/>"
        }
        if(!data.isSubjectAllocated){
    	    msg += "Subject is not available <br/>"
        }
        return msg;

    } 
    const validate =  data =>{
    	var isValid = false;
    	if(data.isVenueAvailable){
	    	isValid = true
	    }
    	return isValid;
    }
    
     const bindFuctions = () => {

     	$(document).on('click', '.checkbox', function () {
                    let counter = $('input[type=checkbox]:checked').length;
                    if (counter > 0) {
                        $("#saveTimetable").show()
                    } else {
                        $("#saveTimetable").hide()
                    }

                })

     	$('#saveTimetable').on('click', function(){
     		var selected = [];
    	     	let counter = $('input[type=checkbox]:checked').length;
    	     	if (counter > 0) {
    	     		$('input[type=checkbox]:checked').each(function (index, el) {
                        selected.push(el.value)
                        $.ajax({
                        	url: $('#saveTimetable').data('url'),
                        	data: {selected: selected, course: $("#course").val(), study_level: $("#study_level").val(), lecturer: $("#lecturer").val(), venue: $("#venue").val(), subject: $("#subject").val(), department: $("#department").val()},
                        	success: function(data){
                        		console.log(data)
                        	},
                        	error: function(data){
                        		console.log(data)
                        	},
                        })
                    })

                    if (selected) {
                    	console.log(selected);
                    }
    	     	}
     	})
     	$('#generate').on('click', function(){
     		 if ( $("#department").val() && $("#course").val() && $("#study_level").val() && $("#subject").val() && $("#venue").val() ) {
     				getItems()
     	   	  	}
     	})
     	$(".timetableProperties").on('change', function(){
     	   const data = $(this).val()
     	   const name = $(this).attr("name");
     	   if (name === "department"){
     	   	  var res = {departmentid:data} 
     	   }
     	   if (name === "study_level"){
     	   	   var res = {studylevelid:data, courseid: $("#course").val()}
     	   }
     	   if (name === "course"){
               var  res = {studylevelid:$("#study_level").val(), courseid: $(this).val()}
               console.log(data)
     	   }
     	   if(data){
     	   	  $.ajax({
     	   	  url: `${$(this).data('url')}`,
     	   	  data:res,
     	   	  success: function(data){
     	   	  	console.log(data)
     	   	  	handleSelect(data)
     	   	  	
     	   	  	
                 
     	   	  },
     	   	  error: function(data){
     	   	  	console.log(data)
     	   	  } 
     	   })
     	   }
     	   const handleSelect = data =>{
    	       
    	         if (name === "department"){
    		        $('#course').empty()
                    $('#course').append(
                        `<option value='' selected >Select Course</option>
                            ${data.map(course => 
                  	      	        `<option value="${course.id}">${course.name}</option>`
                  	      	     )
                  	    }

                  	      ` 
               )

    	       }
    	       if (name === "course" || name === "study_level"){
    		        $('#subject').empty()
                    $('#subject').append(
                        `<option value='' selected >Select Subject</option>
                            ${data.map(course => 
                  	      	        `<option value="${course.id}">${course.name}</option>`
                  	      	     )
                  	    }

                  	      ` 
               )

    	       }

    }
     	  
     	})
     }
    const template = (input) =>{
    	return `
    	        ${input.mon.map((item,index) =>
    	        `<tr>
               <td class="first">
                   <input class="form-control" type="text" name="time" placeholder="${input.mon[index].start_time }- ${input.mon[index].end_time }" readonly>
                  
                </td>

                <td>
                     ${validate(input.mon[index]) ?  `<input type="checkbox" class="checkbox" name="m[]" value="${input.mon[index].id }" style="width: 20px; height: 20px;">` : verdict(input.mon[index]) }
                 </td>
               

                <td>
                   ${validate(input.tue[index]) ?  `<input type="checkbox" class="checkbox" name="t[]" value="${input.tue[index].id }" style="width: 20px; height: 20px;">` : verdict(input.tue[index]) }
                
                </td>

                <td>
                    ${validate(input.wed[index]) ?  `<input type="checkbox" class="checkbox" name="w[]" value="${input.wed[index].id }" style="width: 20px; height: 20px;">` : verdict(input.wed[index]) }
                </td>

                <td>${validate(input.thur[index]) ?  `<input type="checkbox" class="checkbox" name="th[]" value="${input.thur[index].id }" style="width: 20px; height: 20px;">` : verdict(input.thur[index]) }
                  

                </td>

                 <td>
                     ${validate(input.fri[index]) ?  `<input type="checkbox" class="checkbox" name="f[]" value="${input.fri[index].id }" style="width: 20px; height: 20px;">` : verdict(input.fri[index]) }
                 </td>
                </tr>
                     `
    	         )}`

    	     }

    	     const handleSubmition = () => {

    	     }

    	     const submit = () => {
    	     	
    	     }
               
   return{
       init:init
   }
}());