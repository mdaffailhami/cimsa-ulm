import { Container } from 'react-bootstrap';
import PageHeader from '../PageHeader';
import PostsSection from './PostsSection';

export default function BlogPage() {
  return (
    <>
      <Container>
        <PageHeader
          title={'BLOG'}
          //   description={
          //     contents.find((x) => x.column === 'description').text_content
          //   }
          description={
            'Content from our members, seniors, alumni, and activity reports. '
          }
        />
        <PostsSection />
      </Container>
    </>
  );
}
