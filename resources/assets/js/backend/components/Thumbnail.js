import React from "react";
import styled, { css } from "styled-components";
import { Thumbnail, Image } from "react-bootstrap";
import { skinBlue } from "../styles/color";

const shadow = css`
	box-shadow: 0 5px 11px 0 rgba(0,0,0,.18), 0 4px 15px 0 rgba(0,0,0,.15);
	outline: 0;
`;
const StyledThumbnail = styled(Thumbnail)`
  cursor: pointer; 
  
  :hover {
		${shadow}
  }
  
	${({ active }) => active && `
		border : solid 1px ${skinBlue};
		${shadow}
  `}
`;

const StyledImageContainer = styled.div`
	text-align: center;
	position: relative;
	height: 200px;
	overflow: hidden;
	img {
		display: inline-block;
		position: absolute;
		left: 50%;
		top: 50%;
		width: auto;
		transform: translate(-50%, -50%);
	}	
`;

export const ThumbnailGallery = ({ src, children, active }) => {
  return (
    <StyledThumbnail active={active ? 1 : 0}>
      <StyledImageContainer>
        <Image src={src} alt="thumbnail-image" responsive/>
      </StyledImageContainer>
      {children}
    </StyledThumbnail>
  );
};
