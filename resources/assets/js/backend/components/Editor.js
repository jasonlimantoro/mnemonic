import React from 'react';
import PropTypes from "prop-types";

import tinymce from 'tinymce';
import styled from "styled-components";

import { FieldGroup } from "./Form";

// import tinymce-utils
import 'tinymce/themes/modern';
import 'tinymce/plugins/wordcount';
import 'tinymce/plugins/table';
import 'tinymce/plugins/lists';
import 'tinymce/plugins/advlist';
import 'tinymce/plugins/media';
import 'tinymce/plugins/image';
import 'tinymce/plugins/link';
import 'tinymce/plugins/preview';
import 'tinymce/plugins/paste';
import EditorSettings from "../utils/EditorSettings";


class Editor extends React.Component {
  constructor(props) {
    super(props);
  }

  componentDidMount() {
    const { id } = this.props;
    const settings = id ? { selector: `#${id}`, ...EditorSettings } : EditorSettings;
    tinymce.init(settings);
  }

  render() {
    const { ...rest } = this.props;
    return (
      <FieldGroup componentClass="textarea" {...rest} />
    );
  }
}

Editor.propTypes = {
  name: PropTypes.string.isRequired,
  label: PropTypes.string.isRequired,
  id: PropTypes.string,
  defaultValue: PropTypes.string,
};

const StyledEditor = styled(Editor)`
 height: 30vh !important;
`;

export default StyledEditor;