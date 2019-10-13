import React from 'react'
import {toast} from 'react-toastify';

import AddCommentModal from "./AddCommentModal";
import {allComments} from "../apiServices/CommentService";
import CommentCard from './CommentCard'

export default class Comments extends React.Component {

  state = {
    comments: [],
    showAddComment: false
  }

  componentDidMount() {
    this.getAllComments();
  }

  getAllComments = () => {
    allComments().then(response => {
      this.setState({comments: response.data});
    })
  }



  handleAddComment = () => {
    this.setState({
      showAddComment: false
    });
    toast.info("Comment Added", {
      position: toast.POSITION.TOP_RIGHT,
      hideProgressBar: true
    });
    this.getAllComments();
  }

  render() {

    const {user} = this.props;
    const {comments} = this.state;

    return (
      <div className={`flex flex-col`}>
        <div className={`bg-blue-600 h-2 lg:h-4`}></div>
        <div className={`lg:mt-24 w-full lg:w-2/5 lg:mx-auto p-2`}>
          <div className={`flex justify-between mb-2 lg:mb-4`}>
            <div className={`flex`}>
              <div className={`bg-cover h-12 w-12 lg:h-24 lg:w-24 rounded-full border border-gray-600`} style={{backgroundImage: `url(${user.avatar_path})`}}></div>
              <div className={`flex flex-col justify-center ml-2 font-sans`}>
                <div className={`font-bold`}>{user.name}</div>
                <div className={`text-gray-600 text-sm`}>{user.email}</div>
                <div className={`text-gray-600 text-sm`}>Joined on {user.joined_on}</div>
                <div className={`text-red-800 text-xs mt-2 hover:underline`}><a href="/auth/logout">Logout</a></div>
              </div>
            </div>
            <div className={`flex flex-col justify-center`}>
              <button
                onClick={e => this.setState({showAddComment: true})}
                className={`bg-blue-500 text-white hidden lg:block p-3`}>
                Add Comment
              </button>
              <button
                onClick={e => this.setState({showAddComment: true})}
                className={`lg:hidden fixed bg-blue-500 rounded-full h-12 w-12 text-2xl text-white focus:bg-blue-600 focus:outline-none`} style={{bottom: '10px', right: '10px'}}>+</button>
            </div>
          </div>
          {comments.map(comment => (
            <CommentCard key={comment.id} comment={comment} />
          ))}
        </div>
        <AddCommentModal
          onAddComment={this.handleAddComment}
          show={this.state.showAddComment}
          handleOnCancel={e => {
            this.setState({showAddComment: false})
          }}
        />
      </div>
    )
  }

}
