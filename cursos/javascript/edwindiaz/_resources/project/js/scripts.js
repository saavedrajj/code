$(document).ready(function(){
    
    console.log('it works')
    
    var carimages = document.querySelector('.carimages');    
    carimages.addEventListener('click', function(e){
        
        
        if(e.target.tagName === "IMG") {
            
            var overlay = document.createElement('div');
            overlay.id = 'overlay';
           
            
            // Set some styles
            
            overlay.style.position = 'absolute';
            overlay.style.top = 0;
            overlay.style.background = 'rgba(0,0,0,0.7)';
            overlay.style.cursor = 'pointer';
            
            // set some the size
            overlay.style.width = window.innerWidth + 'px';
            overlay.style.height = window.innerHeight + 'px';
            overlay.style.top = window.pageYOffset + 'px';
            overlay.style.left = window.pageXOffset   + 'px';
            
            
            // append to body
            document.body.appendChild(overlay);
            
            
            // find the images source 
                    
            var imageSrc = e.target.src;
            
            // create the image
            
            var largeImage = document.createElement('img');
            largeImage.id = 'large';
            largeImage.src = imageSrc;
            
            // style the image
            
            largeImage.style.display = 'block';
            largeImage.style.width  = '50%';
            largeImage.style.margin = '0 auto';
            largeImage.style.marginTop = '10%';
                      
            
            // append image to the overlay
            overlay.appendChild(largeImage);
            
            
            // resize image to window with and height
            
            window.addEventListener('resize', function(){
                
            if(overlay){
                    
                overlay.style.width  = window.innerWidth + 'px';
                overlay.style.height = window.innerHeight + 'px';
                overlay.style.top    = window.pageYOffset + 'px';
                overlay.style.left   = window.pageXOffset   + 'px';
                          
                }
                
                
            });
            
            
            // set image to follow the window scroll
                        
            window.addEventListener('scroll', function(){
                
                if(overlay){
                    
                overlay.style.top = window.pageYOffset + 'px';
                overlay.style.left = window.pageXOffset   + 'px';
                    
                    
                }
                
                
            });
            
            // remove the image when click after opening 
            
             
            largeImage.addEventListener('click', function(){
                
                if(overlay){
                    
                    overlay.parentElement.removeChild(overlay);
                    
                }
                
                
            });
            
        
        }
     
    }, false);
    

});

    
    
        
        
        
        

        
        
        
        