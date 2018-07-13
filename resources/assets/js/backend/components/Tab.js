import React from "react";
import {
  Tab,
  Nav,
  NavItem,
  Row,
  Col
} from "react-bootstrap";
import { InputFile } from "./Form";
import axios from "axios";
import { RequestImages } from "./Request";
import { withInputChange } from "../contexts/InputValueContext";


export class MediaTabs extends React.Component {
  constructor(props) {
    super(props);
    this.state = {
      file: {},
      previewUrl: '',
    };
    this.handleSelect = this.handleSelect.bind(this);
    this.uploadFile = this.uploadFile.bind(this);
  }

  handleSelect(key) {
    this.props.onSelect(key);
  }

  uploadFile(file, previewUrl) {
    this.setState({
      file,
      previewUrl,
    });
    const formData = new FormData();
    formData.append('vipImage', file, file.name);
    axios
    .post('/uploadAjax', formData)
    .then(response => {
      // const { image } = response.data;
      // const { store } = this.props;
      // store.dispatch({ type: 'UPDATE_INPUT', payload: image.url_cache });
      // this.props.onChangeInput(image.url_cache);
    })
    .catch(err => {
      console.log(err);
    });
  }

  render() {
    const { previewUrl } = this.state;

    const InputChangedRequest = withInputChange(RequestImages);

    const previewImage = previewUrl ? <img src={previewUrl} alt="" className={"img-responsive"}/> : '';

    return (
      <Tab.Container
        id="tabs-with-dropdown"
        activeKey={this.props.tabKey}
        onSelect={this.handleSelect}
      >
        <Row className="clearfix">
          <Col md={12}>
            <Nav bsStyle="tabs" style={{ marginBottom: 20 }}>
              <NavItem eventKey="uploads">Uploads</NavItem>
              <NavItem eventKey="gallery">Gallery</NavItem>
            </Nav>
          </Col>
          <Col md={12}>
            <Tab.Content mountOnEnter>
              <Tab.Pane eventKey="uploads">
                Upload images from your local computer
                <InputFile
                  label="Open file browser"
                  labelClass="btn btn-success"
                  name="image"
                  onChange={this.uploadFile}
                />
                {previewImage}
              </Tab.Pane>
              <Tab.Pane eventKey="gallery">
                Or, use your gallery instead!
                <RequestImages source="/api/images"/>
              </Tab.Pane>
            </Tab.Content>
          </Col>
        </Row>
      </Tab.Container>
    );
  }
}

