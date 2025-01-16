<?php

$code = isset($_GET['id']) ==true ? $_GET['id'] : "IR-images";

?>

                                <section class="box feature">
                                    <script type="text/javascript">

                                        var x=0;

                                        function rotate(num){
                                            fs=document.ff.slide;
                                            x=num%fs.length;
                                            if(x<0) x=fs.length-1;
                                                document.images.show.src=fs.options[x].value;
                                                fs.selectedIndex=x;
                                            }

                                        function auto() {
                                            if(document.ff.fa.value == "Stop"){
                                                rotate(++x);setTimeout("auto()", 800);
                                            }
                                        }

                                        Image1= new Image();
                                        Image1.src = "https://www.metoffice.gov.tt/media/geo/<?=$code?>/1.png";
                                        
                                        Image2 = new Image();
                                        Image2.src = "https://www.metoffice.gov.tt/media/geo/<?=$code?>/2.png";
                                        
                                        Image3 = new Image();
                                        Image3.src = "https://www.metoffice.gov.tt/media/geo/<?=$code?>/3.png";
                                        
                                        Image4 = new Image();
                                        Image4.src = "https://www.metoffice.gov.tt/media/geo/<?=$code?>/4.png";
                                        
                                        Image5 = new Image();
                                        Image5.src = "https://www.metoffice.gov.tt/media/geo/<?=$code?>/5.png";
                                        
                                        Image6 = new Image();
                                        Image6.src = "https://www.metoffice.gov.tt/media/geo/<?=$code?>/6.png";
                                        
                                        Image7 = new Image();
                                        Image7.src = "https://www.metoffice.gov.tt/media/geo/<?=$code?>/7.png";
                                        
                                        Image8 = new Image();
                                        Image8.src = "https://www.metoffice.gov.tt/media/geo/<?=$code?>/8.png";
                                        
                                        Image9 = new Image();
                                        Image9.src = "https://www.metoffice.gov.tt/media/geo/<?=$code?>/9.png";
                                        
                                        Image10 = new Image();
                                        Image10.src = "https://www.metoffice.gov.tt/media/geo/<?=$code?>/10.png";
                                        
                                        Image11 = new Image();
                                        Image11.src = "https://www.metoffice.gov.tt/media/geo/<?=$code?>/11.png";
                                        
                                        Image12 = new Image();
                                        Image12.src = "https://www.metoffice.gov.tt/media/geo/<?=$code?>/12.png";
                                        
                                        Image13 = new Image();
                                        Image13.src = "https://www.metoffice.gov.tt/media/geo/<?=$code?>/13.png";
                                        
                                        Image14 = new Image();
                                        Image14.src = "https://www.metoffice.gov.tt/media/geo/<?=$code?>/14.png";
                                        
                                        Image15 = new Image();
                                        Image15.src = "https://www.metoffice.gov.tt/media/geo/<?=$code?>/15.png";


                                        
                                        function fullwin(){
                                            window.open("full.php?id=<?=$code?>","pfs","fullscreen,scrollbars")
                                        }


                                    </script>	

                                    <!--
                                    <script>
                                    $('#nav li').hover(
                                    function () {
                                    //show its submenu
                                    $('ul', this).stop(true, true).slideDown(100);
                                    },
                                    function () {
                                    //hide its submenu
                                    $('ul', this).stop(true, true).slideUp(100);
                                    }
                                    );</script>-->

                                    <div class="row">
                                     <div class="col-12">

                                    <img class="image featured1" src="https://www.metoffice.gov.tt/media/geo/<?=$code?>/15.png" name="show"/>
                                    <!--<img class="image featured" src="sri7.png" name="show"/>-->
</div>
                                    <form class="row row-cols-lg-auto g-3 align-items-center" name="ff">
 <div class="col-auto">
                                    <input class="btn btn-secondary" type="button" onclick="rotate(0);" value="&#124;&lt;&lt;" title="Jump to beginning" />
                                    </div> <div class="col-auto">
                                    <input class="btn btn-secondary" type="button" onclick="rotate(x-1);" value="&lt;&lt;" title="Last Picture" />
                                    </div> <div class="col-auto">
                                    <input class="btn btn-secondary" type="button" name="fa" 
                                    onclick ="this.value=((this.value=='Stop')?'Start':'Stop');auto();" value="Start" title="Autoplay" />
                                    </div> <div class="col-auto">
                                    <input class="btn btn-secondary" type="button" onclick="rotate(x+1);" value="&gt;&gt;" title="Next Picture" />
                                     </div><div class="col-auto">
                                    <input class="btn btn-secondary" type="button" onclick="rotate(this.form.slide.length-1);" value="&gt;&gt;&#124;" title="Jump to end" />
</div> <div class="col-auto">
                                     <input  class="btn btn-secondary"  type="button" onclick="fullwin()" value="Full Screen"> 
                                     </div> <div class="col-auto">
                                    <select name="slide" class="form-select"  onchange="rotate(this.selectedIndex);">
                                       
                                        <option value="https://www.metoffice.gov.tt/media/geo/<?=$code?>/1.png">1</option>
                                        <option value="https://www.metoffice.gov.tt/media/geo/<?=$code?>/2.png">2</option>
                                        <option value="https://www.metoffice.gov.tt/media/geo/<?=$code?>/3.png">3</option>
                                        <option value="https://www.metoffice.gov.tt/media/geo/<?=$code?>/4.png">4</option>
                                        <option value="https://www.metoffice.gov.tt/media/geo/<?=$code?>/5.png">5</option>
                                        <option value="https://www.metoffice.gov.tt/media/geo/<?=$code?>/6.png">6</option>
                                        <option value="https://www.metoffice.gov.tt/media/geo/<?=$code?>/7.png">7</option>
                                        <option value="https://www.metoffice.gov.tt/media/geo/<?=$code?>/8.png">8</option>
                                        <option value="https://www.metoffice.gov.tt/media/geo/<?=$code?>/9.png">9</option>
                                        <option value="https://www.metoffice.gov.tt/media/geo/<?=$code?>/10.png">10</option>
                                        <option value="https://www.metoffice.gov.tt/media/geo/<?=$code?>/11.png">11</option>
                                        <option value="https://www.metoffice.gov.tt/media/geo/<?=$code?>/12.png">12</option>
                                        <option value="https://www.metoffice.gov.tt/media/geo/<?=$code?>/13.png">13</option>
                                        <option value="https://www.metoffice.gov.tt/media/geo/<?=$code?>/14.png">14</option>
                                        <option value="https://www.metoffice.gov.tt/media/geo/<?=$code?>/15.png">15</option>
                                    </select>
					</div>
                                    <!--<input type="button" value="Close" onClick="window.close('efs')">-->

                                    </form>
                                    </div>
                                </section>
                            
        
