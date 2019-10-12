import React from 'react'
import ReactDOM from 'react-dom'
import {HashRouter as Router, Route, Switch} from "react-router-dom";
import routes from './routes'

class Main extends React.Component {

  state = {
    flattenedRoutes: []
  }

  componentDidMount() {
    this.setState({
      flattenedRoutes: this.buildRoutes([], '', routes)
    });
  }

  buildRoutes = (flattenedRoutes, parentRoute, routes) => {
    routes.forEach(route => {
      let newRoute = {};

      if (parentRoute !== `${parentRoute}/${route.path}`) {
        newRoute.path = `${parentRoute}/${route.path}`;
        newRoute.path = newRoute.path.replace(/\/+/gm, '/');
      } else {
        newRoute.path = route.path;
      }

      // strip off any extra slashes
      if (route.component) {
        newRoute.component = route.component;
        newRoute.exact = route.exact ? route.exact : false;
        flattenedRoutes.push(newRoute);
      }

      if (route.routes) {
        parentRoute = `${parentRoute}/${route.path}`;
        parentRoute = parentRoute.replace(/\/+/gm, '/');
        this.buildRoutes(flattenedRoutes, parentRoute, route.routes);
      }

    });
    return flattenedRoutes;
  }

  render() {

    const {flattenedRoutes} = this.state;

    const renderRoutes = () => {
      return flattenedRoutes.map(route => {
        return <Route key={route.path} exact={route.exact} path={route.path} render={(routeProps) => {
          const Component = route.component;
          return <Component {...routeProps}/>
        }}></Route>;

      });
    }

    return (
      <Router>
          <Switch>
            {renderRoutes()}
          </Switch>
      </Router>
    )
  }
}

ReactDOM.render(<Main/>, document.getElementById('root'));

