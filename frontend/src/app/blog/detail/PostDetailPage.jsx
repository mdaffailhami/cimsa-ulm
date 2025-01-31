import { css } from '@emotion/react';
import { useParams } from 'react-router';
import { setPageMeta } from '../../../utils';
import { Fragment, useEffect, useReducer, useState } from 'react';
import { endpoint } from '../../../configs';
import LoadingPage from '../../../components/LoadingPage';
import { Container, Dropdown, Image } from 'react-bootstrap';
import HtmlParser from '../../../components/HtmlParser';
import BlogSection from '../../../components/BlogSection';

export default function PostDetailPage() {
  const [update, forceUpdate] = useReducer((x) => x + 1, 0);
  const { slug } = useParams();

  const [post, setPost] = useState(undefined);
  const [posts, setPosts] = useState(undefined);

  useEffect(() => {
    setPost(undefined);
    forceUpdate();
  }, [slug]);

  useEffect(() => {
    document.title = 'Post Detail - CIMSA ULM';

    (async () => {
      try {
        const res = await fetch(`${endpoint}/api/post/${slug}`);
        const res2 = await fetch(`${endpoint}/api/post?page=1&limit=3`);
        const data = await res.json();
        const data2 = await res2.json();

        if (!data || !data2) throw new Error('Error fetching data');

        setPageMeta(data.data.title, data.data.highlight);
        setPost(data.data);
        setPosts(data2.data);
      } catch (error) {
        alert(error);
      }
    })();
  }, [update]);

  if (!post || !posts) return <LoadingPage />;

  return (
    <Container
      as={'article'}
      css={css`
        margin-top: 18px;
      `}
    >
      <header>
        <div
          data-aos='fade-left'
          data-aos-duration='1200'
          data-aos-once='true'
          css={css`
            display: flex;
            justify-content: space-between;
            align-items: center;
          `}
        >
          <h1 style={{ flexGrow: 1 }}>{post.title}</h1>
          <Dropdown
            onMouseEnter={(e) => {
              if (!e.target.classList.contains('show')) {
                e.target.click();
              }
            }}
            onMouseLeave={(e) => {
              if (e.target.classList.contains('show')) {
                e.target.click();
              }
            }}
          >
            <Dropdown.Toggle variant='secondary' size='sm'>
              Categories
            </Dropdown.Toggle>

            <Dropdown.Menu as={'ul'} style={{ padding: 0, width: 'auto' }}>
              {post.categories.map((category, i) => (
                <Fragment key={i}>
                  {i != 0 && <Dropdown.Divider style={{ margin: 0 }} />}
                  <Dropdown.Item
                    as={'li'}
                    style={{ textAlign: 'center', padding: 0 }}
                    onMouseOver={(e) => {
                      e.target.style.backgroundColor = 'transparent';
                    }}
                    onMouseOut={(e) => {
                      e.target.style.backgroundColor = 'unset';
                    }}
                  >
                    {category}
                  </Dropdown.Item>
                </Fragment>
              ))}
            </Dropdown.Menu>
          </Dropdown>
        </div>
        <Image
          data-aos='fade'
          data-aos-duration='1200'
          data-aos-once='true'
          src={post.cover}
          css={css`
            position: relative;
            max-width: 800px;
            width: 100%;
            display: block;
            margin: 10px auto;
            z-index: -1;
          `}
        />
      </header>
      <hr />
      <main data-aos='fade' data-aos-duration='1200' data-aos-once='true'>
        <HtmlParser html={post.content} />
      </main>
      <hr />
      <BlogSection
        posts={posts}
        header={
          <h1 className='text-center' style={{ marginBottom: '18px' }}>
            CHECK OUT OUR OTHER POSTS!
          </h1>
        }
      />
      <br />
    </Container>
  );
}
