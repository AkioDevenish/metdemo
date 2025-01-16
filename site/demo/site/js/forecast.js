d3 = require("d3@5");

ImpactOnGlobalTemperatures = {
  
  const container = d3.select(DOM.svg(width+margin.left+margin.right, 
                                      height+margin.top+margin.bottom))
 
   const buttonColor = "#696969";
  const titleFontSize = "20px";
   const font = "Lato, sans-serif";
  const instructionFontSize = "14px";
  const highlightColor = "#C68400";
  const animateDuration = 2500;
  
    /// THERMOMETER /////////////////////////////////////////////////////////
    
  const tempGroup = container
       .append("g")
         .attr("transform", "translate(" + margin.left + "," + margin.top + ")") 
  
  const thermometerX = 177;
  const thermometerY = 80;
  
  const thermometer = tempGroup.append("image")
                          .attr('xlink:href', await FileAttachment("thermometer.png").url())
                          .attr("x", thermometerX) 
                          .attr("y", thermometerY)
                          .attr("height", "340px")
                          .attr("width", "100.8902px")
                          .attr("src", await FileAttachment("thermometer.png").url())
                          .classed("in-progess", false)
                     
  const mercuryCircle = tempGroup.append("circle")
                          .attr("cx", thermometerX + 50.5)
                          .attr("cy", thermometerY + 290)
                          .attr("r", 35)
                          .attr("fill", "#82A868")
                          
  const tempTitle = tempGroup.append("text")
                           .text("Impact on Global Temperatures")
                           .attr("x", thermometerX-87)
                           .attr("y", 0)
                           .style("font-size", titleFontSize)
                           .style("fill", "black")
                           .style("font-family", font)
                           .style("text-anchor", "start")
                            .style("font-weight", "Bold")
  
  const tempAxisLabelA = tempGroup.append("text")
                           .text("Temperature")
                           .attr("x", 0)
                           .attr("y", 200)
                           .style("font-size", instructionFontSize)
                           .style("fill", buttonColor)
                           .style("font-family", font)
                           .style("text-anchor", "start")
                            .style("font-weight", "Bold")
  
    
  const tempAxisLabelB = tempGroup.append("text")
                           .text("Increase")
                           .attr("x", 0)
                           .attr("y", 220)
                           .style("font-size", instructionFontSize)
                           .style("fill", buttonColor)
                           .style("font-family", font)
                           .style("text-anchor", "start")
                            .style("font-weight", "Bold")
  
  const tempAxisLabelC = tempGroup.append("text")
                           .text("Above")
                           .attr("x", 0)
                           .attr("y", 240)
                           .style("font-size", instructionFontSize)
                           .style("fill", buttonColor)
                           .style("font-family", font)
                           .style("text-anchor", "start")
                            .style("font-weight", "Bold")
     
  
   const tempAxisLabelD = tempGroup.append("text")
                           .text("Pre-Industrial")
                           .attr("x", 0)
                           .attr("y", 260)
                           .style("font-size", instructionFontSize)
                           .style("fill", buttonColor)
                           .style("font-family", font)
                           .style("text-anchor", "start")
                            .style("font-weight", "Bold")
   
    const tempAxisLabelE = tempGroup.append("text")
                           .text("Levels")
                           .attr("x", 0)
                           .attr("y", 280)
                           .style("font-size", instructionFontSize)
                           .style("fill", buttonColor)
                           .style("font-family", font)
                           .style("text-anchor", "start")
                            .style("font-weight", "Bold")
    
  const tempYear = tempGroup.append("text")
                           .text("2017 (Today)")
                           .attr("x", thermometerX + 48)
                           .attr("y", 55)
                           .style("font-size", 30)
                           .style("fill", buttonColor)
                           .style("font-family", font)
                           .style("text-anchor", "middle")
    
   const tick4C = tempGroup.append("text")
                           .text("4°C")
                           .attr("x", thermometerX)
                           .attr("y", thermometerY + 79)
                           .style("font-size", instructionFontSize)
                           .style("fill", buttonColor)
                           .style("font-family", font)
                           .style("text-anchor", "end")
   
   const tick3C = tempGroup.append("text")
                           .text("3°C")
                           .attr("x", thermometerX)
                           .attr("y", thermometerY + 126)
                           .style("font-size", instructionFontSize)
                           .style("fill", buttonColor)
                           .style("font-family", font)
                           .style("text-anchor", "end")                  

   
   const tick2C = tempGroup.append("text")
                           .text("2°C")
                           .attr("x", thermometerX)
                           .attr("y", thermometerY + 173)
                           .style("font-size", instructionFontSize)
                           .style("fill", highlightColor)
                           .style("font-family", font)
                           .style("text-anchor", "end") 
                           .style("font-weight", "Bold")
   
   const targetLimit = tempGroup.append("text")
                           .text("Target")
                           .attr("x", thermometerX-48)
                           .attr("y", thermometerY + 160)
                           .style("font-size", instructionFontSize)
                           .style("fill", highlightColor)
                           .style("font-family", font)
                           .style("text-anchor", "middle") 
                           .style("font-weight", "Bold")
  
     const targetLimitb = tempGroup.append("text")
                           .text("Limit")
                           .attr("x", thermometerX -48)
                           .attr("y", thermometerY + 180)
                           .style("font-size", instructionFontSize)
                           .style("fill", highlightColor)
                           .style("font-family", font)
                           .style("text-anchor", "middle") 
                           .style("font-weight", "Bold")
   
   const tick1C = tempGroup.append("text")
                           .text("1°C")
                           .attr("x", thermometerX)
                           .attr("y", thermometerY + 220)
                           .style("font-size", instructionFontSize)
                           .style("fill", buttonColor)
                           .style("font-family", font)
                           .style("text-anchor", "end")   
      
   
   const tempIncreaseValue = tempGroup.append("text")
                           .text("+1.1")
                           .attr("x", thermometerX + 49)
                           .attr("y", thermometerY + 206)
                           .style("font-size", "13px")
                           .style("fill", "#82A868")
                           .style("font-family", font)
                           .style("text-anchor", "middle")  
                            .style("font-weight", "Bold")
    
    const mercuryRiseRed = tempGroup.append("rect")
                .attr("x", thermometerX + 40.5)
                .attr("y", thermometerY + 211 - 45)
                .attr("width", 20)
                .attr("height", 0)
                .style("fill", "firebrick") 
                //.style("visibility", "hidden")
   
   const mercuryRiseGreen2 = tempGroup.append("rect")
                .attr("x", thermometerX + 40.5)
                .attr("y", thermometerY + 211)
                .attr("width", 20)
                .attr("height", 0)
                .style("fill", "#82A868") 
                //.style("visibility", "hidden")
   
   const mercuryRiseGreen = tempGroup.append("rect")
                .attr("x", thermometerX + 40.5)
                .attr("y", thermometerY + 211)
                .attr("width", 20)
                .attr("height", 110)
                .style("fill", "#82A868") 
   
  
   
   const ticks = tempGroup.append("text")
                           .text("- - - -")
                           .attr("x", thermometerX + 50)
                           .attr("y", thermometerY + 172)
                           .style("font-size", "17px")
                           .style("fill", highlightColor)
                           .style("font-family", font)
                           .style("text-anchor", "middle") 
                           .style("font-weight", "Bold")

   const resultMessageA = tempGroup.append("text")
                              .style("visibility", "hidden")
                              .style("font-family", font)
                               .style("font-size", "20px")
   
   const resultMessageB = tempGroup.append("text")
                              .style("visibility", "hidden")
                              .style("font-family", font)
                               .style("font-size", instructionFontSize)
  
  // BUTTONS ////////////////////////////////
  const buttonWidth = 320;
  const buttonHeight = 60;
  const spaceBetween = 10;
  const borderRadius = 15;
//  const buttonColor = "#696969";
 // const highlightColor = "#C68400";
  
  const buttonGroup = container
       .append("g")
         .attr("transform", "translate(" + (width -buttonWidth ) + "," + margin.top + ")") 
  
  // create buttons
  const buttons = buttonGroup.selectAll("buttons")
    .data(TempChangeData)
    .enter().append("rect")
      .attr("x", 0)
      .attr("y", d => d.id*(buttonHeight + spaceBetween) + 50)
      .attr("width", buttonWidth)
      .attr("height", buttonHeight)
      .style("fill", "white")
      .style("stroke-width", 2)
      .style("rx", borderRadius)
      .style("ry", borderRadius)
      .attr("stroke", buttonColor)
      .attr("id", d => "button" + d.id)
    
  // add text to buttons
  function buttonText(svg, id, text) {
    let x = svg.append("text")
            .attr("x", buttonWidth/2)
            .attr("y", id*(buttonHeight + spaceBetween) + 85)
            .text(text)
            .style("text-anchor", "middle")
            .style("font-size", "16px")
            .style("font-family", font)
            .style("fill", buttonColor)
            .style("font-weight", "Bold")
            .attr("id", "buttonText" + id)
            .classed("buttonText", true)
  
    return x;
  }
  
    function buttonTextMultiLine(svg, id, text1, text2) {
    let a = svg.append("text")
            .attr("x", buttonWidth/2)
            .attr("y", id*(buttonHeight + spaceBetween) + 75)
            .text(text1)
            .style("text-anchor", "middle")
            .style("font-size", "16px")
            .style("font-family", font)
            .style("fill", buttonColor)
            .style("font-weight", "Bold")
            .attr("id", "buttonText" + id)
            .classed("buttonText", true)
    let b = svg.append("text")
            .attr("x", buttonWidth/2)
            .attr("y", id*(buttonHeight + spaceBetween) + 97)
            .text(text2)
            .style("text-anchor", "middle")
            .style("font-size", "14px")
            .style("font-family", font)
            .style("fill", buttonColor)
            .attr("id", "buttonText" + id +"a")
            .classed("buttonText", true)
    return [a,b];
  }
    const buttonText1 = buttonTextMultiLine(buttonGroup, 1, "50% Higher  (7.1 tonnes)", "(Expected outcome with current    climate policies.)");
  const buttonText2 = buttonTextMultiLine(buttonGroup, 2, "About The Same  (5.4 tonnes)", "(Within a 15% increase from today.)");
  const buttonText3 = buttonText(buttonGroup, 3, "50% Lower  (2.3 tonnes)");
   const buttonText4 = buttonText(buttonGroup, 4, "80% Lower  (0.9 tonnes)");
  
   const resetButton = buttonGroup.append('rect')
  .attr('x', 0)
  .attr('y', 400)
  .attr('height', 35)
  .attr('width', 100)
   .style("fill", "white")
.style("stroke", "#82A868")
.style('visibility', 'hidden')
   .style("stroke-width", 2)
  .style("rx", borderRadius)
      .style("ry", borderRadius)
   
const resetText = buttonGroup.append('text')
  .attr('x', 28)
  .attr('y', 423)
  .text("RESET")
  .attr("fill", "#82A868")
   .style('visibility', 'hidden')
.style('font-family', font)
.style('font-weight', 'Bold')

resetButton.on("mouseover", function() {
  d3.select(this).style("fill", "#ebf7e4")
 
})
  
resetButton.on("mouseout", function() {
  d3.select(this).style("fill", "white")
})
  
resetText.on("mouseover", function() {
  resetButton.style("fill", "#ebf7e4")
 
})
  
resetText.on("mouseout", function() {
  resetButton.style("fill", "white")
})  
  
  // Button Hover
   buttons.on('mouseover', function(d) {
     
     let currentButton = d3.select(this);
     
      // change button stroke color
      d3.select(this).style("stroke", highlightColor)  
     
      d3.selectAll("#buttonText" + d.id)
       .style('fill', function () {
          return currentButton.classed("clicked") == true ? 'white' : highlightColor;})
     
      d3.selectAll("#buttonText" + d.id + 'a')
       .style('fill', function () {
          return currentButton.classed("clicked") == true ? 'white' : highlightColor;})
     
   });
  
  
   buttons.on('mouseout', function (d) { 
     
     let currentButton = d3.select(this);
     
     d3.select(this).style("stroke", function () {
          return d3.select(this).classed("clicked") == true ? highlightColor : buttonColor;}) 
     
     d3.selectAll("#buttonText" + d.id)
       .style('fill', function () {
          return currentButton.classed("clicked") == true ? "white" : buttonColor;})
     
     d3.selectAll("#buttonText" + d.id + 'a')
       .style('fill', function () {
          return currentButton.classed("clicked") == true ? "white" : buttonColor;})
     
   });

   buttonText1[0].on('mouseover', function(d) {
     d3.select(this).style("fill", function () {
          return d3.selectAll("#button1").classed("clicked") == true ? "white" : highlightColor;}) 
     
     d3.selectAll("#buttonText1a")
        .style("fill", function () {
          return d3.selectAll("#button1").classed("clicked") == true ? "white" : highlightColor;}) 
     
     d3.selectAll("#button1")
        .style("stroke", highlightColor)
      
   });
  
  buttonText1[1].on('mouseover', function(d) {
     d3.select(this).style("fill", function () {
          return d3.selectAll("#button1").classed("clicked") == true ? "white" : highlightColor;}) 
    
    d3.selectAll("#buttonText1")
        .style("fill", function () {
          return d3.selectAll("#button1").classed("clicked") == true ? "white" : highlightColor;}) 
     
    d3.selectAll("#button1")
        .style("stroke", highlightColor)
    
   });
  
  buttonText1[0].on('mouseout', function(d) {
     d3.select(this).style("fill", function () {
          return d3.selectAll("#button1").classed("clicked") == true ? "white" : buttonColor;}) 
    
     d3.selectAll("#buttonText1a")
        .style("fill", function () {
          return d3.selectAll("#button1").classed("clicked") == true ? "white" : buttonColor;}) 
     
     d3.selectAll("#button1")
        .style("stroke", function () {
          return d3.select(this).classed("clicked") == true ? highlightColor : buttonColor;})    
   });
  
  
  buttonText1[1].on('mouseout', function(d) {
     d3.select(this).style("fill", function () {
          return d3.selectAll("#button1").classed("clicked") == true ? "white" : buttonColor;}) 
    
      d3.selectAll("#buttonText1")
        .style("fill", function () {
          return d3.selectAll("#button1").classed("clicked") == true ? "white" : buttonColor;}) 
     
    d3.selectAll("#button1")
        .style("stroke", function () {
          return d3.select(this).classed("clicked") == true ? highlightColor : buttonColor;})
   });
  
     buttonText2[0].on('mouseover', function(d) {
     d3.select(this).style("fill", function () {
          return d3.selectAll("#button2").classed("clicked") == true ? "white" : highlightColor;}) 
     
     d3.selectAll("#buttonText2a")
        .style("fill", function () {
          return d3.selectAll("#button2").classed("clicked") == true ? "white" : highlightColor;}) 
     
     d3.selectAll("#button2")
        .style("stroke", highlightColor)
   });
  
  buttonText2[1].on('mouseover', function(d) {
     d3.select(this).style("fill", function () {
          return d3.selectAll("#button2").classed("clicked") == true ? "white" : highlightColor;}) 
    
    d3.selectAll("#buttonText2")
        .style("fill", function () {
          return d3.selectAll("#button2").classed("clicked") == true ? "white" : highlightColor;}) 
     
    d3.selectAll("#button2")
        .style("stroke", highlightColor)
    
   });
  
  buttonText2[0].on('mouseout', function(d) {
     d3.select(this).style("fill", function () {
          return d3.selectAll("#button2").classed("clicked") == true ? "white" : buttonColor;}) 
    
     d3.selectAll("#buttonText2a")
        .style("fill", function () {
          return d3.selectAll("#button2").classed("clicked") == true ? "white" : buttonColor;}) 
     
     d3.selectAll("#button2")
        .style("stroke", function () {
          return d3.select(this).classed("clicked") == true ? highlightColor : buttonColor;})
   });
  
  buttonText2[1].on('mouseout', function(d) {
     d3.select(this).style("fill", function () {
          return d3.selectAll("#button2").classed("clicked") == true ? "white" : buttonColor;}) 
    
      d3.selectAll("#buttonText2")
        .style("fill", function () {
          return d3.selectAll("#button2").classed("clicked") == true ? "white" : buttonColor;}) 
     
    d3.selectAll("#button2")
        .style("stroke", function () {
          return d3.select(this).classed("clicked") == true ? highlightColor : buttonColor;})
   });
  
     buttonText3.on('mouseover', function(d) {
     d3.select(this).style("fill", function () {
          return d3.selectAll("#button3").classed("clicked") == true ? 'white' : highlightColor;}) 
     
     d3.selectAll("#button3")
        .style("stroke", highlightColor)
   });
  
  buttonText4.on('mouseover', function(d) {
     d3.select(this).style("fill", function () {
          return d3.selectAll("#button4").classed("clicked") == true ? 'white' : highlightColor;}) 
     
    d3.selectAll("#button4")
        .style("stroke", highlightColor)
    
   });
  
  buttonText3.on('mouseout', function(d) {
     d3.select(this).style("fill", buttonColor) 
     
     d3.selectAll("#button3")
        .style("stroke", buttonColor)
   });
  
  buttonText4.on('mouseout', function(d) {
     d3.select(this).style("fill", buttonColor) 
     
    d3.selectAll("#button4")
        .style("stroke", buttonColor)
   });
  
  
  // Button CLICK /////////////////////////////// CLICK///////////////////////////////////////////////////////
    
 const reset = function() {

   
   
  //reset buttons  
      buttons.style("stroke",  buttonColor)
        .style('fill',  'white')
         .classed("clicked", false);
     
      d3.selectAll(".buttonText")
        .style('fill', buttonColor)
           
           
       resetButton.style('visibility', 'hidden')
           resetText.style('visibility', 'hidden')
    
  // reset thermometer
      tempIncreaseValue.text("+1.1")
                           .attr("x", thermometerX + 49)
                           .attr("y", thermometerY + 206)
                           .style("font-size", "13px")
                           .style("fill", "#82A868")
                           .style("font-family", font)
                           .style("text-anchor", "middle")  
                            .style("font-weight", "Bold")
    
   mercuryRiseRed
                .attr("x", thermometerX + 40.5)
                .attr("y", thermometerY + 211 - 45)
                .attr("width", 20)
                .attr("height", 0)
                .style("fill", "firebrick") 
                //.style("visibility", "hidden")
   
   mercuryRiseGreen2
                .attr("x", thermometerX + 40.5)
                .attr("y", thermometerY + 211)
                .attr("width", 20)
                .attr("height", 0)
                .style("fill", "#82A868") 
                //.style("visibility", "hidden")
   
   mercuryRiseGreen
                .attr("x", thermometerX + 40.5)
                .attr("y", thermometerY + 211)
                .attr("width", 20)
                .attr("height", 110)
                .style("fill", "#82A868") 
     
     tempYear.text("2017 (Today)")
   
   resultMessageA.style("visibility", "hidden")
   resultMessageB.style("visibility", "hidden")
   
   }

resetButton.on("click", function() {
  reset();
})    
  
  resetText.on("click", function() {
  reset();
})    
  
    const animateThermometer = function(d) {
     
      thermometer.classed("in-progress", true)
      
        //Animation
           
      tempIncreaseValue.style("fill", "white");
    
       tempYear.text(2017)
       .transition()
       .duration(animateDuration)
        .tween("text", function() {
        let i = d3.interpolate(this.textContent, 2100);

        return function(t) {
            this.textContent = Math.round(i(t));
        };
})
      
      mercuryRiseGreen2
       .transition() 
        .ease(d3.easeLinear)
        .duration(function () {
          return d.y_distance > 45 ?  animateDuration*(45/d.y_distance): animateDuration;})        
        .attr("y", function () {
          return d.y_distance > 45 ? thermometerY + 212 - 45 : thermometerY + 212 - d.y_distance;})
      .attr("height", function () {
          return d.y_distance > 45 ? 45 : d.y_distance})
    
        .on("end", function() {
        mercuryRiseRed
              .transition()
             .ease(d3.easeLinear)
             .duration(function () {
          return d.y_distance > 45 ?(1-(45/d.y_distance))*animateDuration: 0;})
             .attr("y", thermometerY + 212 -d.y_distance)
             .attr("height", d.y_distance - 45 +5)
        
          .on("end", function() {
           tempIncreaseValue
               .attr("y", thermometerY + 207 - d.y_distance)
               .text("+" + d.temp_2100)
               .style("fill", function () {
          return d.y_distance > 45 ? 'firebrick' : "#82A868"})
          
          ////
          resultMessageA
            .style("fill", function() {
            return d.id == 1 || d.id == 2 ? "firebrick" : "#82A868"})
            .text( function (){
          return d.id == 1 || d.id == 2 ? "Failed to Meet Goal!": "Goal Achieved!" })
            .attr("x", thermometerX + 90 )
            .attr("y", thermometerY + 207 - d.y_distance +5)
            .style("font-weight", "bold")
            .style("visibility", "visible")
          
          resultMessageB
             .style("fill", function() {
            return d.id == 1 || d.id == 2 ? "firebrick" : "#82A868"})
            .text( function (){
          return d.id == 1 || d.id == 2 ? "Global warming would exceed 2°C limit": "Global warming would stay below 2°C limit" })
            .attr("x", thermometerX + 90 )
            .attr("y", thermometerY + 207 - d.y_distance +30)
            .style("visibility", "visible")
          
          
          resetButton.style('visibility', 'visible')
          resetText.style('visibility', 'visible')  
          thermometer.classed("in-progress", false)
          
          
        })
          })  
    }
  
    const animateThermometer2 = function(y_distance, temp_2100) {
        //Animation
      
       thermometer.classed("in-progress", true)
      tempIncreaseValue.style("fill", "white");
    
       tempYear.text(2017)
       .transition()
       .duration(animateDuration)
        .tween("text", function() {
        let i = d3.interpolate(this.textContent, 2100);

        return function(t) {
            this.textContent = Math.round(i(t));
        };
})
      
      mercuryRiseGreen2
       .transition() 
        .ease(d3.easeLinear)
        .duration(function () {
          return y_distance > 45 ?  animateDuration*(45/y_distance): animateDuration;})        
        .attr("y", function () {
          return y_distance > 45 ? thermometerY + 212 - 45 : thermometerY + 212 - y_distance;})
      .attr("height", function () {
          return y_distance > 45 ? 45 : y_distance})
     
        .on("end", function() {
        mercuryRiseRed
              .transition()
             .ease(d3.easeLinear)
             .duration(function () {
          return y_distance > 45 ?(1-(45/y_distance))*animateDuration: 0;})
             .attr("y", thermometerY + 212 -y_distance)
             .attr("height", y_distance - 45  +5)
        
          .on("end", function() {
           tempIncreaseValue
               .attr("y", thermometerY + 207 - y_distance)
               .text("+" + temp_2100)
               .style("fill", function () {
          return y_distance > 45 ? 'firebrick' :  "#82A868"})
             
          
           ////
          resultMessageA
            .style("fill", function() {
            return y_distance > 45 ? "firebrick" : "#82A868"})
            .text( function (){
          return y_distance > 45  ? "Failed to Meet Goal!": "Goal Achieved!" })
            .attr("x", thermometerX + 90 )
            .attr("y", thermometerY + 207 - y_distance +5)
            .style("font-weight", "bold")
            .style("visibility", "visible")
          
          resultMessageB
             .style("fill", function() {
            return y_distance > 45  ? "firebrick" : "#82A868"})
            .text( function (){
          return y_distance > 45  ? "Global warming would exceed 2°C limit": "Global warming would stay below 2°C limit" })
            .attr("x", thermometerX + 90 )
            .attr("y", thermometerY + 207 - y_distance +30)
            .style("visibility", "visible")
          
          
          
          resetButton.style('visibility', 'visible')
          resetText.style('visibility', 'visible')
             thermometer.classed("in-progress", false)
        })
      
          })  }
    
  buttons.on('click', function(d) {
     if (thermometer.classed("in-progress") == false) {
     
    reset();
    
     // change button stroke color
     buttons.style("stroke", function (button_d) {
          return button_d.id != d.id ? buttonColor : highlightColor;})
        .style('fill', function (button_d) {
          return button_d.id != d.id ? 'white' : highlightColor;})
         .classed("clicked", function (button_d) {
          return button_d.id != d.id ? false : true;});
     
      d3.selectAll(".buttonText")
        .style('fill', buttonColor)
      
      d3.selectAll("#buttonText" + d.id)
       .style('fill', 'white')
     
      d3.selectAll("#buttonText" + d.id + 'a')
       .style('fill', 'white')
  
      
 animateThermometer(d); 
     }
   });
  
const button1y_distance = 93
const button2y_distance = 70
const button3y_distance = 28
const button4y_distance = 12

const button1_2100temp = 3.0
const button2_2100temp = 2.5
const button3_2100temp = 1.7
const button4_2100temp = 1.3
  
   buttonText1[0].on('click', function(d) {
      if (thermometer.classed("in-progress") == false) {
     reset();
     // change other buttontext back to normal
     d3.selectAll(".buttonText")
        .style('fill', buttonColor)
     
     d3.select(this).style("fill", 'white') 
     
     d3.selectAll("#buttonText1a")
        .style("fill", 'white') 
     
     d3.selectAll("#button1")
        .style("stroke", highlightColor).style('fill', highlightColor)  
        .classed("clicked", true)
     
     // make sure rest of buttons are not clicked
     d3.selectAll("#button2")
        .style("stroke", buttonColor).style('fill', 'white')  
        .classed("clicked", false)
     
     d3.selectAll("#button3")
        .style("stroke", buttonColor).style('fill', 'white')  
        .classed("clicked", false)
     
     d3.selectAll("#button4")
        .style("stroke", buttonColor).style('fill', 'white')  
        .classed("clicked", false)
     
 animateThermometer2(button1y_distance, button1_2100temp);

      }
   });
  
  buttonText1[1].on('click', function(d) {
     if (thermometer.classed("in-progress") == false) {
    reset();
    // change other buttontext back to normal
    d3.selectAll(".buttonText")
        .style('fill', buttonColor)
    
    d3.select(this).style("fill", 'white') 
    
    d3.selectAll("#buttonText1")
        .style("fill", 'white') 
     
    d3.selectAll("#button1")
        .style("stroke", highlightColor).style('fill', highlightColor) 
        .classed("clicked", true)
    
         // make sure rest of buttons are not clicked
     d3.selectAll("#button2")
        .style("stroke", buttonColor).style('fill', 'white')  
        .classed("clicked", false)
     
     d3.selectAll("#button3")
        .style("stroke", buttonColor).style('fill', 'white')  
        .classed("clicked", false)
     
     d3.selectAll("#button4")
        .style("stroke", buttonColor).style('fill', 'white')  
        .classed("clicked", false)
    
     animateThermometer2(button1y_distance, button1_2100temp);
     }
   });
  
   buttonText2[0].on('click', function(d) {
      if (thermometer.classed("in-progress") == false) {
     reset();
     // change other buttontext back to normal
    d3.selectAll(".buttonText")
        .style('fill', buttonColor)
     
     d3.select(this).style("fill", 'white') 
     
     d3.selectAll("#buttonText2a")
        .style("fill", 'white') 
     
     d3.selectAll("#button2")
        .style("stroke", highlightColor).style('fill', highlightColor) 
        .classed("clicked", true)
     
     
     
              // make sure rest of buttons are not clicked
     d3.selectAll("#button1")
        .style("stroke", buttonColor).style('fill', 'white')  
        .classed("clicked", false)
     
     d3.selectAll("#button3")
        .style("stroke", buttonColor).style('fill', 'white')  
        .classed("clicked", false)
     
     d3.selectAll("#button4")
        .style("stroke", buttonColor).style('fill', 'white')  
        .classed("clicked", false)
     
      animateThermometer2(button2y_distance, button2_2100temp);
      }
   });
  
  buttonText2[1].on('click', function(d) {
     if (thermometer.classed("in-progress") == false) {
    reset();
    // change other buttontext back to normal
    d3.selectAll(".buttonText")
        .style('fill', buttonColor)
    
     d3.select(this).style("fill", 'white') 
    
    d3.selectAll("#buttonText2")
        .style("fill", 'white') 
     
    d3.selectAll("#button2")
        .style("stroke", highlightColor).style('fill', highlightColor) 
        .classed("clicked", true)
    
    
                  // make sure rest of buttons are not clicked
     d3.selectAll("#button1")
        .style("stroke", buttonColor).style('fill', 'white')  
        .classed("clicked", false)
     
     d3.selectAll("#button3")
        .style("stroke", buttonColor).style('fill', 'white')  
        .classed("clicked", false)
     
     d3.selectAll("#button4")
        .style("stroke", buttonColor).style('fill', 'white')  
        .classed("clicked", false)
    
     animateThermometer2(button2y_distance, button2_2100temp);
     }
   });
  
  
  
     buttonText3.on('click', function(d) {
        if (thermometer.classed("in-progress") == false) {
       reset();
       
     // change other buttontext back to normal
    d3.selectAll(".buttonText")
        .style('fill', buttonColor)  
       
     d3.select(this).style("fill", 'white') 
     
     d3.selectAll("#button3")
        .style("stroke", highlightColor).style('fill', highlightColor) 
        .classed("clicked", true)
       
       
                       // make sure rest of buttons are not clicked
     d3.selectAll("#button1")
        .style("stroke", buttonColor).style('fill', 'white')  
        .classed("clicked", false)
     
     d3.selectAll("#button2")
        .style("stroke", buttonColor).style('fill', 'white')  
        .classed("clicked", false)
     
     d3.selectAll("#button4")
        .style("stroke", buttonColor).style('fill', 'white')  
        .classed("clicked", false)
       
        animateThermometer2(button3y_distance, button3_2100temp);
        }
   });
  
  buttonText4.on('click', function(d) {
    
     if (thermometer.classed("in-progress") == false) {
    reset();
    
    // change other buttontext back to normal
    d3.selectAll(".buttonText")
        .style('fill', buttonColor)
    
    d3.select(this).style("fill", 'white') 
     
    d3.selectAll("#button4")
        .style("stroke", highlightColor).style('fill', highlightColor)
        .classed("clicked", true)
    
     // make sure rest of buttons are not clicked
     d3.selectAll("#button1")
        .style("stroke", buttonColor).style('fill', 'white')  
        .classed("clicked", false)
     
     d3.selectAll("#button2")
        .style("stroke", buttonColor).style('fill', 'white')  
        .classed("clicked", false)
     
     d3.selectAll("#button3")
        .style("stroke", buttonColor).style('fill', 'white')  
        .classed("clicked", false)
    
           animateThermometer2(button4y_distance, button4_2100temp);
     }
   });

  
                  

  
  // TEXT ///////////////////////////////////
 
  // title
  //const titleFontSize = "20px";
  
  const buttonTitleA = buttonGroup.append('text')
    .text("Carbon Footprint of Each Person on")
    .attr("x", 0)
    .attr("y", 0)
    .style("text-anchor", "start")
    .style("font-size", titleFontSize)
    .style("fill", "black")
    .style("font-family", font)
    .style("font-weight", "Bold")
  
  const buttonTitleB = buttonGroup.append('text')
    .text("Earth in the Year 2050")
    .attr("x", 0)
    .attr("y", 28)
    .style("text-anchor", "start")
    .style("font-size", titleFontSize)
    .style("fill", "black")
    .style("font-family", font)
    .style("font-weight", "Bold")
  
 
  // instructions
  //const instructionFontSize = "14px";
  
  const buttonInstructionA = buttonGroup.append('text')
    .text("Choose an option below to see how changes in each")
    .attr("x", 0)
    .attr("y", 55)
    .style("text-anchor", "start")
    .style("font-size", instructionFontSize)
    .style("fill", "black")
    .style("font-family", font)
  
    const buttonInstructionB = buttonGroup.append('text')
    .text("person's annual carbon footprint from today")
    .attr("x", 0)
    .attr("y", 77)
    .style("text-anchor", "start")
    .style("font-size", instructionFontSize)
    .style("fill", "black")
    .style("font-family", font)
   
    const buttonInstructionC = buttonGroup.append('text')
    .text("(4.8 tonnes) would impact global temperatures.")
    .attr("x", 0)
    .attr("y", 99)
    .style("text-anchor", "start")
    .style("font-size", instructionFontSize)
    .style("fill", "black")
    .style("font-family", font)
  
    

   
  return container.node();
}