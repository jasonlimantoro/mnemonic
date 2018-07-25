import React from "react";
import { Image } from "react-bootstrap";

import styled from "styled-components";


const ImageSlide = ({ url, imageClass, children, ...rest }) => {
  return (
   <div {...rest}>
     <Image src={url} alt={'image'} responsive/>
     {children}
   </div>
  );
};

const StyledImageSlide = styled(ImageSlide)`
  cursor: pointer;
  padding: 15px;
`;

export default StyledImageSlide;
