import ReactHabitat from "react-habitat";
import { DeleteIcon } from "./components/Icon";
import { DeleteButton } from "./components/Button";

import { FancyInput, SimpleInput } from "./containers/FormContainer";
import Editor from "./components/Editor";


const components = {
  DeleteIcon,
  DeleteButton,
  FancyInput,
  Editor,
  SimpleInput
};

class AppBootstrapper extends ReactHabitat.Bootstrapper {
  constructor() {
    super();
    // Create a new container builder:
    this.builder = new ReactHabitat.ContainerBuilder();

    // Registering Components
    for (const key in components) {
      this.registerComponent(components[key], key);
    }

    // Finally, set the container
    this.setContainer(this.builder.build());
  }

  registerComponent(Component, alias) {
    this.builder.register(Component).as(alias);
  }

}

export default new AppBootstrapper();
