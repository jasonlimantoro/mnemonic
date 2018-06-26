import React from "react";

const ImageSlide = ({ url, containerClass, imageClass, children, ...rest }) => {
  return (
   <div className={containerClass} {...rest}>
     <div className={imageClass}>
       <img src={url} alt={'image'} className={'img-responsive'}/>
     </div>
     {children}
   </div>
  );
};

export default ImageSlide;
