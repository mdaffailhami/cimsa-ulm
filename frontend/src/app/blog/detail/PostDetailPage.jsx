import { css, Global } from '@emotion/react';
import { useParams } from 'react-router';
import { fetchJSON } from '../../../utils';
import { Fragment, useEffect } from 'react';
import { endpoint } from '../../../configs';
import LoadingPage from '../../../components/LoadingPage';
import { Container, Dropdown, Image } from 'react-bootstrap';
import HtmlParser from '../../../components/HtmlParser';
import BlogSection from '../../../components/BlogSection';
import useSWR from 'swr';
import LoadFailedPage from '../../../components/LoadFailedPage';
import PageMeta from '../../../components/PageMeta';
import './style.css';

export default function PostDetailPage() {
  const { slug } = useParams();

  const post = useSWR(`${endpoint}/api/post/${slug}`, fetchJSON);
  const posts = useSWR(`${endpoint}/api/post?page=1&limit=6`, fetchJSON);

  // Re-render page when slug changes (e.g. BlogSection in this PostDetailPage is clicked (same route))
  useEffect(() => {
    (async () => {
      await post.mutate();
    })();
  }, [slug]);

  // Effect to fix CKEditor left & right image alignment
  useEffect(() => {
    if (!post.data) return;

    const targetToClear = document.querySelectorAll(
      'figure.image-style-block-align-left, figure.image-style-block-align-right'
    );

    targetToClear.forEach((image) => {
      const clearDiv = document.createElement('div');
      clearDiv.style.display = 'block';
      clearDiv.style.clear = 'both';

      image.insertAdjacentElement('afterend', clearDiv);
    });
  }, [post.data]);

  if (post.isLoading || posts.isLoading) {
    return <LoadingPage />;
  }

  if (post.error || posts.error) {
    return <LoadFailedPage />;
  }

  return (
    <>
      <PageMeta
        title={post.data.data.title}
        description={post.data.data.highlight}
        ogImage={post.data.data.cover}
      />
      <Global
        // Styles to fix CKEditor left & right image alignment
        styles={css`
          figure.image,
          figure.image img {
            display: block;
            margin: 0 auto;
          }

          figure.image-style-block-align-left {
            float: left;
          }

          figure.image-style-block-align-right {
            float: right;
          }

          /* Inline image */
          p img {
            vertical-align: bottom;
          }
        `}
      />
      <main>
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
              <h1 style={{ flexGrow: 1 }}>{post.data.data.title}</h1>
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
                  {post.data.data.categories.map((category, i) => (
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
              src={post.data.data.cover}
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
            <HtmlParser html={post.data.data.content} />
          </main>
          <hr />
          <BlogSection
            posts={posts.data.data}
            header={
              <h1 className='text-center' style={{ marginBottom: '18px' }}>
                CHECK OUT OUR OTHER POSTS!
              </h1>
            }
          />
          <br />
        </Container>
      </main>
    </>
  );
}
