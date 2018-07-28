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

export const ThumbnailGallery = ({ src, children, active }) => {
  return (
    <StyledThumbnail active={active ? 1 : 0}>
      <div className="thumbnail-image">
        <Image src={src} alt="thumbnail-image" responsive/>
      </div>
      {children}
    </StyledThumbnail>
  );
};
