import { css } from '@emotion/react';
import { Card, Col, Container, Row } from 'react-bootstrap';

export default function OfficialCardSection({
  period,
  position,
  picture,
  name,
  email,
  phone,
}) {
  return (
    <div style={{ background: '#2d2d2d' }}>
      <div
        style={{
          display: 'flex',
          justifyContent: 'center',
          paddingTop: '18px',
          paddingBottom: '18px',
        }}
      >
        <Card
          css={css`
            border: none;
            border-radius: 20px;
            overflow: hidden;
            width: 300px;

            @media (min-width: 768px) {
              width: 740px;
            }
          `}
        >
          <Row className='d-flex justify-content-center align-items-center'>
            <Col
              xs={12}
              sm={12}
              md={4}
              lg={4}
              css={css`
                height: 300px;

                @media (min-width: 768px) {
                  height: 240px;
                }
              `}
            >
              <img
                src={picture}
                alt={name}
                css={css`
                  width: 100%;
                  height: 100%;
                  object-fit: cover;
                `}
              />
            </Col>
            <Col
              xs={12}
              sm={12}
              md={8}
              lg={8}
              css={css`
                line-height: 1.1;

                @media (max-width: 767.99px) {
                  text-align: center;
                  display: flex;
                  flex-direction: column;
                  justify-content: center;
                  align-items: center;
                  padding: 10px;
                }
              `}
            >
              <div
                css={css`
                  color: #989898;
                  margin-bottom: 12px;
                  font-size: 16px;

                  @media (min-width: 768px) {
                    font-size: 20px;
                  }
                `}
              >
                CIMSA ULM {period}
              </div>
              <div
                css={css`
                  color: black;
                  margin-bottom: 18px;
                  font-size: 20px;

                  @media (min-width: 768px) {
                    font-size: 23px;
                  }
                `}
              >
                {position}
              </div>
              <div
                css={css`
                  font-weight: bold;
                  font-size: 22px;

                  @media (min-width: 768px) {
                    font-size: 25px;
                  }
                `}
              >
                {name}
              </div>
              <hr
                css={css`
                  border-color: red;
                  border-width: 2px;
                  opacity: 1;
                  width: 75%;
                  margin-top: 8px;
                  margin-bottom: 10px;

                  @media (min-width: 768px) {
                    width: 80%;
                  }
                `}
              />
              <div
                css={css`
                  color: #989898;
                  font-size: 17px;

                  @media (min-width: 768px) {
                    font-size: 19px;
                  }
                `}
              >
                {email}
              </div>
              <div
                css={css`
                  color: #989898;
                  font-size: 17px;

                  @media (min-width: 768px) {
                    font-size: 19px;
                  }
                `}
              >
                {phone}
              </div>
            </Col>
          </Row>
        </Card>
      </div>
      <hr style={{ margin: '0', color: 'white', padding: '13px' }} />
    </div>
  );
}
