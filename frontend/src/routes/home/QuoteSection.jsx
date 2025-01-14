import { css } from '@emotion/react';
import { Col, Container, Row } from 'react-bootstrap';

export default function QuoteSection({ quote, author, image }) {
  return (
    <div
      style={{
        background: '#2d2d2d',
        paddingTop: '17.5px',
        paddingBottom: '10px',
        color: 'white',
      }}
    >
      <Container
        css={css`
          @media (max-width: 575.99px) {
            padding-left: 19px;
            padding-right: 19px;
          }
        `}
      >
        <Row xs={1} sm={1} md={1} lg={2}>
          <Col>
            <center>
              <img
                src={image}
                width={600}
                css={css`
                  height: 300px;
                  border-radius: 10px;
                  object-fit: cover;

                  @media (min-width: 768px) {
                    height: 360px;
                  }
                `}
                data-aos='flip-right'
                data-aos-duration='1200'
                data-aos-once='true'
              />
            </center>
          </Col>
          <Col>
            <blockquote
              className='blockquote d-flex flex-column justify-content-center'
              style={{ height: '100%' }}
            >
              <h2
                css={css`
                  font-weight: normal;
                  font-style: italic;
                  font-size: 26px;

                  @media (min-width: 992px) {
                    font-size: 31px;
                  }
                `}
                data-aos='fade-left'
                data-aos-duration='1200'
                data-aos-once='true'
              >
                ❝ {quote} ❞
              </h2>
              <footer
                className='blockquote-footer'
                css={css`
                  text-align: right;
                  margin-top: 0;
                  margin-right: 40px;
                  font-size: 22px;

                  @media (min-width: 992px) {
                    font-size: 26px;
                  }
                `}
              >
                {author}
              </footer>
            </blockquote>
          </Col>
        </Row>
      </Container>
      <hr />
    </div>
  );
}
